<?php
/**
 * 
 * '@Mention System [English]
 * 
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'MENTIONS_TITLE_ACP'								=> '@Mention System',
	'MENTIONS_SETTINGS_ACP'								=> 'Configuració',

	'MENTIONS_TITLE'									=> '@Mention System',
	'MENTIONS_TITLE_EXPLAIN'							=> 'Permet que els usuaris mencionin altres usuaris als missatges. Si es menciona un usuari, rebrà una notificació llevat que hagi desactivat aquesta notificació. Els noms d\'usuaris mencionats es poden posar automàticament del color del seu nom d\'usuari. Se suggeriran automàticament usuaris mencionats.',
	'MENTIONS_COPYRIGHT'								=> '© 2015 Wolfsblvt (www.pinkes-forum.de) [<a href="http://pinkes-forum.de/dev/find.php">Més extensions de Wolfsblvt</a>]',

	// General settings
	'MENTIONS_SETTINGS_GENERAL'							=> 'Configuració general',
	'MENTIONS_ACTIVE_BBCODE'							=> 'Activa el BBCode [mention]',
	'MENTIONS_ACTIVE_BBCODE_EXPLAIN'					=> 'Activa la possibilitat de mencionar usuaris amb el BBCode [mention]Usuari[/mention].',
	'MENTIONS_ACTIVE_BBCODE_TEXT'						=> 'Activa el BBCode [mention=]',
	'MENTIONS_ACTIVE_BBCODE_TEXT_EXPLAIN'				=> 'Activa la possibilitat de mencionar usuaris amb el BBCode [mention="Usuari"]Sobrenom[/mention]. Amb aquest BBCode podeu escollir el nom que voleu mostrar en mencionar un usuari. Per exemple, sobrenoms o diminutius. Podeu veure\'n el nom d\'usuari real si passeu per sobre de la menció.',
	'MENTIONS_ACTIVE_AT'								=> 'Activa l\'opció de menció amb @',
	'MENTIONS_ACTIVE_AT_EXPLAIN'						=> 'Activa la possibilitat de mencionar usuaris simplement escrivint &quot;@&quot;, seguida del nom d\'usuari.',
	'MENTIONS_REPLACE_IN_TEXT'							=> 'Substitueix les mencions al text',
	'MENTIONS_REPLACE_IN_TEXT_EXPLAIN'					=> 'Si ho activeu, les mencions al text se substituiran per l\'enllaç a l\'usuari amb el color correcte.',
	'MENTIONS_IMAGE_INLINE'								=> 'Avatar davant del nom d\'usuari substituït',
	'MENTIONS_IMAGE_INLINE_EXPLAIN'						=> 'Si ho activeu, es mostrarà l\'avatar de l\'usuari abans del nom d\'usuari.',

	// Autocomplete settings
	'MENTIONS_SETTINGS_AUTOCOMPLETE'					=> 'Configuració de l\'autocompletat',
	'MENTIONS_ACT_VOTES_HIDE'							=> 'Activa amagar els vots',
	'MENTIONS_AUTOCOMPLETE_ENABLED'						=> 'Autocompleta les mencions',
	'MENTIONS_AUTOCOMPLETE_ENABLED_EXPLAIN'				=> 'Si ho activeu, se suggeriran noms d\'usuari amb autocompleció mentre escriviu.',
	'MENTIONS_AUTOCOMPLETE_TOPIC_POSTERS'				=> 'Usuaris que han escrit al tema a dalt',
	'MENTIONS_AUTOCOMPLETE_TOPIC_POSTERS_EXPLAIN'		=> 'Si ho activeu, els usuaris que ja hagin escrit al tema s\'ordenaran de manera que apareguin a dalt de la llista autocompletada.',
	'MENTIONS_AUTOCOMPLETE_AUTOCLOSE_BBCODE'			=> 'Tanca automàticament els BBCodes de mencions',
	'MENTIONS_AUTOCOMPLETE_AUTOCLOSE_BBCODE_EXPLAIN'	=> 'Si ho activeu, els BBCodes de mencions es tancaran automàticament en escriure la menció.',

	// Load settings
	'MENTIONS_SETTINGS_AUTOCOMPLETE'					=> 'Configuració de càrrega',
	'MENTIONS_MIN_POSTS_SUGGEST'						=> 'Mínim de missatges per ser mencionat',
	'MENTIONS_MIN_POSTS_SUGGEST_EXPLAIN'				=> 'El nombre de misssatges que cal que tingui un usuari perquè pugui ser mencionat. Definiu-ho a 0 perquè siguin tots els usuaris.<br />Tingueu en compte que una gran quantitat d\'usuaris que poden ser esmentats pot alentir el lloc quan es carreguen els missatges amb mencions. En fòrums amb molts usuaris, és recomanable que incrementeu aquest valor. <i>(Per defecte: 1)</i>',
	'MENTIONS_MAXIMUM_AT_MENTIONS_PER_POST'				=> 'Limita les mencions &quot;@&quot; per missatge',
	'MENTIONS_MAXIMUM_AT_MENTIONS_PER_POST_EXPLAIN'		=> 'El nombre màxim de &quot;@&quot; que es tractaran per enviar-hi notificacions i convertir-les a noms d\'usuari en un missatge. Tingueu en compte que moltes mencions en un missatge poden alentir el lloc quan es carrega el missatge. <i>(Per defecte: 50)</i>',
	'MENTIONS_AUTOCOMPLETE_REMOTE_LOAD'					=> 'Carrega l\'autocompletat remotament',
	'MENTIONS_AUTOCOMPLETE_REMOTE_LOAD_EXPLAIN'			=> 'Si ho activeu, la llista de noms d\'usuari que poden ser mencionats no es carregarà de cop, sinó cara vegada que escriviu un caràcter de la menció. Aquesta opció està pensada per a fòrums amb una gran quantitat d\'usuaris, en què carregar la llista sencera trigaria massa. Tingueu en compte que això alentirà l\'autocompleció, ja que caldrà demanar els usuaris al servidor cada vegada.',
));
