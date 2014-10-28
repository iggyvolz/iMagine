<?php

namespace iMagine;

if (version_compare(PHP_VERSION, '5.4', '<'))
{
	echo 'Error - Please use verison 0.3 LTS if you are using 5.3 or earlier.';
	goto end;
}
error_reporting(E_ALL);
@session_start(); // Don't return an error if session already started
require_once realpath(__DIR__ . '/includes/index.php');
if (!isset($_POST['contents']))
{
	goto end;
}
$_POST['contents'] = htmlspecialchars($_POST['contents']); // Sanitize input
$contents = strtolower($_POST['contents']);
$_SESSION['ftgr']['returns'][] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$_SESSION['ftgr']['returns'][] = 'Who is ' . $person . '???';
	goto end;
}
if (!is_callable(array($$person, $action)) OR $action[0] === '_')
{
	$_SESSION['ftgr']['returns'][] = ucfirst($person) . ': How do I "' . $action . '"?';
	goto end;
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
		$returned = call_user_func(array($battle->opponents [$i], $battle->pick_move($i)), array($valid_fightmon[rand(0, count($valid_fightmon) - 1)]));
		foreach ($returned as $value)
		{
			$_SESSION['ftgr']['returns'][] = $value;
		}
	}
}
end: