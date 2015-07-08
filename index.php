<?php

namespace iMagine;

require "config.php";
error_reporting(E_ALL);
ini_set("display_errors",1);
define("FROM_INDEX",true);
register_shutdown_function(function(){file_put_contents($argv[1],serialize($iMagine));});
require_once 'includes/index.php';
$iMagine=unserialize(file_get_contents($argv[1]));
$contents=$argv[2];
$iMagine->returns[] = '>' . $contents;
list($person,$action,$pars)=parse_contents($contents);
if(isset($iMagine->people[$person]))
{
	if (!is_callable(array($iMagine->people[$person], $action)) OR $action[0] === '_')
	{
		$iMagine->returns[] = ucfirst($person) . ': How do I "' . $action . '"?';
	}
	else
	{
		$returned = call_user_func(array($iMagine->people[$person], $action), ...$pars);
		foreach ($returned as $value)
		{
			$iMagine->returns[] = $value;
		}
	}
}
else
{
	$owner=null;
	foreach(array_keys($iMagine->people) as $possibleowner)
	{
		if(isset($iMagine->people[$possibleowner]->dreamcreatures[$person]))
		{
			$owner=$possibleowner;
		}
	}
	if($owner)
	{
		if (!is_callable(array($iMagine->people[$owner]->dreamcreatures[$person], $action)) OR $action[0] === '_')
		{
			$iMagine->returns[] = ucfirst($person) . ': How do I "' . $action . '"?';
		}
		else
		{
			$returned = call_user_func(array($iMagine->people[$owner]->dreamcreatures[$person], $action), ...$pars);
			foreach ($returned as $value)
			{
				$iMagine->returns[] = $value;
			}
		}
	}
	else
	{
		$iMagine->returns[] = 'Who is ' . $person . '???';
	}
}
