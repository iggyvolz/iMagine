<?php

if (!defined('FTGR_WINDOWS'))
{
	define('FTGR_WINDOWS', FALSE); // Change this to TRUE if you use Windows.
	define('FTGR_SLASH', FTGR_WINDOWS ? '\/' : '/');
}
session_start();
if (!isset($_SESSION['ftgr']))
{
	die('No direct access');
}
if (is_null($_SESSION['ftgr']['cutscene']))
{
	die('Direct access not allowed');
}
header('Content-type: application/x-shockwave-flash');
readfile(__DIR__ . FTGR_SLASH . 'includes' . FTGR_SLASH . 'cutscenes' . FTGR_SLASH . $_SESSION['ftgr']['cutscene'] . '.swf');
