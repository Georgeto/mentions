<?php
/**
 * 
 * '@Mention System
 * 
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 * @patched for 3.2 by InuYaksa
 */

namespace wolfsblvt\mentions\notification;

class mention extends \phpbb\notification\type\post
{

	/**
	 * Get notification type name
	 *
	 * @return string
	 */
	public function get_type()
	{
		return 'wolfsblvt.mentions.notification.type.mention';
	}

	/**
	 * Language key used to output the text
	 *
	 * @var string
	 */
	protected $language_key = 'NOTIFICATION_MENTION';

	/**
	 * Notification option data (for outputting to the user)
	 *
	 * @var bool|array False if the service should use it's default data
	 * 					Array of data (including keys 'id', 'lang', and 'group')
	 */
	public static $notification_option = array(
		'lang'	=> 'NOTIFICATION_TYPE_MENTION',
		'group'	=> 'NOTIFICATION_GROUP_POSTING',
	);

	/** @var \wolfsblvt\mentions\core\mentions */
	protected $mentions;

  
	public function set_mentions(\wolfsblvt\mentions\core\mentions $mentions)
	{
		$this->mentions = $mentions;
	}

	/**
	 * Is this type available to the current user (defines whether or not it will be shown in the UCP Edit notification options)
	 *
	 * @return bool True/False whether or not this is available to the user
	 */
	public function is_available()
	{
		return true;
	}

	/**
	 * Find the users who want to receive notifications
	 *
	 * @param array $post Data from submit_post
	 * @param array $options Options for finding users for notification
	 *
	 * @return array
	 */
	public function find_users_for_notification($post, $options = array())
	{
		$options = array_merge(array(
			'ignore_users'		=> array(),
		), $options);

		$users = $this->mentions->get_mentioned_users($post['post_text']);
		$user_ids = array_map(function ($value) { return (int) $value['user_id']; }, $users);

		$notify_users = $this->get_authorised_recipients($user_ids, $post['forum_id'], $options, true);
    
		if (empty($notify_users)) {
			return array();
		}    

		// Try to find the users who already have been notified about replies and have not read the topic since and just update their notifications
		$notified_users = $this->notification_manager->get_notified_users($this->get_type(), array(
			'item_parent_id'	=> static::get_item_parent_id($post),
			'read'				=> 0,
		));

		foreach ($notified_users as $user => $notification_data) {
			unset($notify_users[$user]);

			/** @var post $notification */
			$notification = $this->notification_manager->get_item_type_class($this->get_type(), $notification_data);
			$update_responders = $notification->add_responders($post);
			if (!empty($update_responders))
			{
				$this->notification_manager->update_notification($notification, $update_responders, array(
					'item_parent_id'	=> self::get_item_parent_id($post),
					'read'				=> 0,
					'user_id'			=> $user,
				));
			}
		}

		return $notify_users;    
    
	}

	/**
	 * Update a notification
	 *
	 * @param array $post Data specific for this type that will be updated
	 */
	public function update_notifications($post)
	{
		// Find the new users to notify
		$notifications = $this->find_users_for_notification($post); // updated for 3.2

		// Add the necessary notifications
		$this->notification_manager->add_notifications_for_users($this->get_type(), $post, $notifications);

		// return true to continue with the update code in the notifications service (this will update the rest of the notifications)
		return true;
	}

	/**
	 * {inheritDoc}
	 */
	public function get_redirect_url()
	{
		return $this->get_url();
	}

	/**
	 * Get email template
	 *
	 * @return string|bool
	 */
	public function get_email_template()
	{
		return '@wolfsblvt_mentions\mention';
	}

	/**
	 * Get email template variables
	 *
	 * @return array
	 */
	public function get_email_template_variables()
	{
		$user_data = $this->user_loader->get_user($this->get_data('poster_id'));

		return array_merge(parent::get_email_template_variables(), array(
			'AUTHOR_NAME'		=> htmlspecialchars_decode($user_data['username']),
		));
	}
}
