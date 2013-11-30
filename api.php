<?php

if (!defined('FTGR_WINDOWS'))
{
	define('FTGR_WINDOWS', FALSE); // Change this to TRUE if you use Windows.
	define('FTGR_SLASH', FTGR_WINDOWS ? '\/' : '/');
}
define('FTGR_MODE', 'api');
require_once __DIR__ . FTGR_SLASH . 'index.php';
