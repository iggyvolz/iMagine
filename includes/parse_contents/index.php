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
		if (!in_array($person, array(
					strtolower(FTGR_DRAGIRI_NAME),
					strtolower(FTGR_FIREE_BEE_NAME),
					strtolower(FTGR_GHOST_SLICER_NAME),
					strtolower(FTGR_HARTVILE_NAME),
					strtolower(FTGR_NIGHTWING_NAME),
					strtolower(FTGR_PLANTSY_NAME),
					strtolower(FTGR_PLUFF_NAME),
					strtolower(FTGR_REE_BEE_NAME),
					strtolower(FTGR_REEMON_NAME),
					strtolower(FTGR_STRAB_NAME)
				))) // Prevent access of unwanted variables
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
