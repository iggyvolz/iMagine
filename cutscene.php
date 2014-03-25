<?php

// hello
namespace ftgr;

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
readfile(realpath(__DIR__ . '/includes/cutscenes/' . $_SESSION['ftgr']['cutscene'] . '.swf'));
