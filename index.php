<?php

namespace iMagine;

define("IN_IMAGINE",true);
define("IMAGINE_ACCESS","GAME");
require "config.php";
error_reporting(E_ALL);
ini_set("display_errors",1);
@session_start(); // Don't return an error if session already started
require_once realpath(__DIR__ . '/includes/index.php');
if (!isset($_POST['contents']))
{
	goto end;
}
$_POST['contents'] = htmlspecialchars($_POST['contents']); // Sanitize input
$contents = strtolower($_POST['contents']);
$_SESSION['iMagine']['returns'][] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$_SESSION['iMagine']['returns'][] = 'Who is ' . $person . '???';
	goto end;
}
if (!is_callable(array($$person, $action)) OR $action[0] === '_')
{
	$_SESSION['iMagine']['returns'][] = ucfirst($person) . ': How do I "' . $action . '"?';
	goto end;
}
$returned = call_user_func(array($$person, $action), $person, ...$pars);
foreach ($returned as $value)
{
	$_SESSION['iMagine']['returns'][] = $value;
}
if (!is_null($battle)) // IN DEVELOPMENT
{
	for ($i = 0; $i < count($battle->opponents); $i++)
	{
		$valid_fightmon = array();
		foreach (array('tony','edyn','strag') as $value)
		{
			if ($$value->energy !== 73291759828375)
			{
				$valid_fightmon[] = $value;
			}
		}
		$returned = call_user_func(array($battle->opponents [$i], $battle->pick_move($i)), array($valid_fightmon[rand(0, count($valid_fightmon) - 1)]));
		foreach ($returned as $value)
		{
			$_SESSION['iMagine']['returns'][] = $value;
		}
	}
}
end:
