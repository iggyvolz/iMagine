<?php

if (!defined('FTGR_WINDOWS'))
{
	define('FTGR_WINDOWS', FALSE); // Change this to TRUE if you use Windows.
	define('FTGR_SLASH', FTGR_WINDOWS ? '\/' : '/');
}
error_reporting(E_ALL);
@session_start(); // Don't return an error if session already started
require_once __DIR__ . FTGR_SLASH . 'includes' . FTGR_SLASH . 'index.php';
if (!isset($_POST['contents']))
{
	die;
}
$_POST['contents'] = htmlspecialchars($_POST['contents']); // Sanitize input
$contents = strtolower($_POST['contents']);
$_SESSION['ftgr']['returns'][] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$_SESSION['ftgr']['returns'][] = 'Who is ' . $person . '???';
	die;
}
if (!is_callable(array($$person, $action)) OR $action[0] === '_')
{
	$_SESSION['ftgr']['returns'][] = ucfirst($person) . ': How do I "' . $action . '"?';
	die;
}
$returned = call_user_func(array($$person, $action), $pars);
foreach ($returned as $value)
{
	$_SESSION['ftgr']['returns'][] = $value;
}
if (!is_null($battle))
{
	for ($i = 0; $i < count($battle->opponents); $i++)
	{
		$valid_fightmon = array();
		foreach (array('blazer', 'curleaf', 'dragiri', 'feniixis', 'fireebee', 'flike', 'ghostslicer', 'hartvile', 'krabulous', 'nightwing', 'plantsy', 'pluff', 'reebee', 'reemon', 'skelestorm', 'strab') as $value)
		{
			if ($$value->energy !== 73291759828375)
			{
				$valid_fightmon[] = $value;
			}
		}
		foreach ($battle->pick_move($i) as $value)
		{
			$_SESSION['ftgr']['returns'][] = $value;
		}
	}
}