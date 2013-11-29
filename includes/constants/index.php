<?php

if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'normal');
}
define('FTGR_STARTING_ENERGY', 1000);
define('FTGR_VERSION', "0.2.0dev");
define('FTGR_LANG', 'EN'); //EN - English, other languages pending.
// NOTE - Translations need some work, we need to separate the localized value of $person from the english value of $person
define('FTGR_DEBUG', TRUE); // If TRUE, allow the debug command to run
require_once __DIR__ . '/people/index.php';
require_once __DIR__ . '/fightmon/index.php';
require_once __DIR__ . '/dialogue/index.php';
