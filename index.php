<?php

namespace iMagine;

define("IN_IMAGINE",true);
define("IMAGINE_ACCESS","GAME");
require "envtest.php";
require "config.php";
error_reporting(E_ALL);
ini_set("display_errors",1);
require_once realpath(__DIR__ . '/includes/index.php');
$iMagine=unserialize(file_get_contents($argv[1]));
$contents=$argv[2];
$iMagine->returns[] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$iMagine->returns[] = 'Who is ' . $person . '???';
	goto end;
}
if (!is_callable(array($$person, $action)) OR $action[0] === '_')
{
	$iMagine->returns[] = ucfirst($person) . ': How do I "' . $action . '"?';
	goto end;
}
$returned = call_user_func(array($$person, $action), $person, ...$pars);
foreach ($returned as $value)
{
	$iMagine->returns[] = $value;
}
/*if (!is_null($battle)) // IN DEVELOPMENT
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
			$iMagine->returns[] = $value;
		}
	}
}*/
end:
file_put_contents($argv[1],serialize($iMagine));
