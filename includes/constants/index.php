<?php

if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'normal');
}
define('FTGR_STARTING_ENERGY', 1000);
define('FTGR_VERSION', "0.3.0dev");
define('FTGR_LANG', 'EN'); //EN - English, other languages pending.
// NOTE - Translations need some work, we need to separate the localized value of $person from the english value of $person
define('FTGR_DEBUG', TRUE); // If TRUE, allow the debug command to run
define('FTGR_ALLOW_ANY_UPDATE', TRUE); // Allow anyone to run the update command.
define('FTGR_UPDATE_CODE', NULL); // Put the update code in place of NULL to validate your session for update.
define('FTGR_DEBUG_ON', itemOf(array('EN' => 'Debug mode is now on.'), FTGR_LANG));
define('FTGR_DEBUG_OFF', itemOf(array('EN' => 'Debug mode is now off.'), FTGR_LANG));
define('FTGR_OPENED_HELP', itemOf(array('EN' => 'Opened help.'), FTGR_LANG));
define('FTGR_CURRENT_VERSION_IS', itemOf(array('EN' => 'Current version is '), FTGR_LANG));
require_once __DIR__ . FTGR_SLASH . 'fightmon' . FTGR_SLASH . 'index.php';
require_once __DIR__ . FTGR_SLASH . 'dialogue' . FTGR_SLASH . 'index.php';
