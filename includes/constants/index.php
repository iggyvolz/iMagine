<?php

namespace iMagine;

if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'normal');
}
define('FTGR_VERSION', "1.0.0alpha");
define('FTGR_LANG', 'en_US'); // en_US - English (US), fr_FR - French (France), es_ES - Spanish (Spain) [In progress]
define('FTGR_DEBUG', TRUE); // If TRUE, allow the debug command to run
define('FTGR_ALLOW_ANY_UPDATE', TRUE); // Allow anyone to run the update command.
define('FTGR_UPDATE_CODE', NULL); // Put the update code in place of NULL to validate your session for update.
require_once realpath(__DIR__ . '/fightmon/index.php');
require_once realpath(__DIR__ . '/moves/index.php');
require_once realpath(__DIR__ . '/dependencies/index.php');
