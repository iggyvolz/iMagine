<?php

if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'normal');
}
define('FTGR_VERSION', "0.3.0RC1");
define('FTGR_LANG', isset($_SESSION['ftgr']['userlang']) ? $_SESSION['ftgr']['userlang'] : 'en_US'); // en_US - English (US), en_GB - English (UK) [in progress], fr_FR - French (France) [in progress], es_ES - Spanish (Spain) [In progress]
define('FTGR_DEBUG', TRUE); // If TRUE, allow the debug command to run
define('FTGR_ALLOW_ANY_UPDATE', TRUE); // Allow anyone to run the update command.
define('FTGR_UPDATE_CODE', NULL); // Put the update code in place of NULL to validate your session for update.
require_once __DIR__ . FTGR_SLASH . 'fightmon' . FTGR_SLASH . 'index.php';
require_once __DIR__ . FTGR_SLASH . 'moves' . FTGR_SLASH . 'index.php';
