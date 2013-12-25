<?php

if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'normal');
}
define('FTGR_PRODUCTION', TRUE); // Set to TRUE if on a production server to automatically set options below
define('FTGR_STARTING_ENERGY', 1000);
define('FTGR_VERSION', "0.2.0");
define('FTGR_VERSION_NICKNAME', 'Helium');
define('FTGR_LANG', 'EN'); //EN - English, other languages pending.
define('FTGR_DISABLED', 'Debug mode has been disabled by an administrator.');
// NOTE - Translations need some work, we need to separate the localized value of $person from the english value of $person
define('FTGR_DEBUG', !FTGR_PRODUCTION); // If TRUE, allow the debug command to run
define('FTGR_ALLOW_ANY_UPDATE', !FTGR_PRODUCTION); // Allow anyone to run the update command.
define('FTGR_UPDATE_CODE', NULL); // Put the update code in place of NULL to validate your session for update.
require_once __DIR__ . FTGR_SLASH . 'people' . FTGR_SLASH . 'index.php';
require_once __DIR__ . FTGR_SLASH . 'fightmon' . FTGR_SLASH . 'index.php';
require_once __DIR__ . FTGR_SLASH . 'dialogue' . FTGR_SLASH . 'index.php';
