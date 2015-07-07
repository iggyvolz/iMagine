<?php

namespace iMagine;

require "config.php";
error_reporting(E_ALL);
ini_set("display_errors",1);
require_once 'includes/index.php';
$iMagine=unserialize(file_get_contents($argv[1]));
$contents=$argv[2];
$iMagine->returns[] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$iMagine->returns[] = 'Who is ' . $person . '???';
	goto end;
}
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
end:
file_put_contents($argv[1],serialize($iMagine));
