<?php

function parse_contents($contents) // Returns true if invalid person.  Invalid action is checked elsewhere
{
	global $me, $action, $person, $pars;
	if (strpos($contents, '.') === false)
	{
		$actionWithPars = $contents;
	}
	else
	{
		$actionWithPars = itemOf(explode('.', $contents), 1);
	}
	if (strpos($contents, '.') === false OR itemOf(explode('.', $contents), 0) == 'i')
	{
		$person = $me;
	}
	else
	{
		$person = itemOf(explode('.', $contents), 0);
		if (!in_array($person, array(strtolower(FTGR_NECHKA_NAME), strtolower(FTGR_APPARITION_NAME), strtolower(FTGR_SHADE_NAME), strtolower(FTGR_REEMON_NAME), 'pluff', 'dragiri'))) // Prevent access of unwanted variables
		{
			return true;
		}
	}
	$action = itemOf(explode('(', $actionWithPars), 0);
	if (strpos($contents, '(') === false)
	{
		$pars = null;
	}
	else
	{
		$pars = itemOf(explode('(', $actionWithPars), 1);
		$pars = itemOf(explode(')', $pars), 0);
		$pars = explode(',', $pars);
	}
	return false;
}
