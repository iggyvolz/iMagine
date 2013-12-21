<?php

if (!defined('FTGR_WINDOWS'))
{
	define('FTGR_WINDOWS', FALSE); // Change this to TRUE if you use Windows.
	define('FTGR_SLASH', FTGR_WINDOWS ? '\/' : '/');
}
if (isset($_GET['mode']))
{
	switch ($_GET['mode'])
	{
		case 'PY':
			define('FTGR_MODE', 'PY');
			$_POST['contents'] = $_GET['text'];
			break;

		case 'PY_test':
			define('FTGR_MODE', 'PY_test');
			break;

		default:
			define('FTGR_MODE', 'api');
			break;
	}
}
if (!defined('FTGR_MODE'))
{
	define('FTGR_MODE', 'api');
}
require_once __DIR__ . FTGR_SLASH . 'index.php';
