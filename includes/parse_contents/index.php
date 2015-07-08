<?php

namespace iMagine;

function parse_contents($contents) // Returns true if invalid person.  Invalid action is checked elsewhere
{
	global $iMagine, $action, $person, $pars;
	if (strpos($contents, '.') === false)
	{
		$actionWithPars = $contents;
	}
	else
	{
		$actionWithPars = explode('.', $contents)[1];
	}
	if (strpos($contents, '.') === false OR explode('.', $contents)[0] == 'i')
	{
		$person = $iMagine->me;
	}
	else
	{
		$person = explode('.', $contents)[0];
		if (!in_array($person, array(
					strtolower(_("Tony")),
					strtolower(_("Edyn")),
					strtolower(_("Strag")),
					strtolower(_("Furok")),
					strtolower(_("Freep")),
					strtolower(_("Ugger"))
				))) // Prevent access of unwanted variables
		{
			return true;
		}
	}
	$action = explode('(', $actionWithPars)[0];
	if (strpos($contents, '(') === false)
	{
		$pars = [];
	}
	else
	{
		$pars = explode('(', $actionWithPars)[1];
		$pars = explode(')', $pars)[0];
		$pars = explode(',', $pars);
	}
	return false;
}
