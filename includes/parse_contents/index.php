<?php

namespace ftgr;

function parse_contents($contents) // Returns true if invalid person.  Invalid action is checked elsewhere
{
	global $me, $action, $person, $pars;
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
		$person = $me;
	}
	else
	{
		$person = explode('.', $contents)[0];
		if (!in_array($person, array(
					strtolower(_("Blazer")),
					strtolower(_("Curleaf")),
					strtolower(_("Dragiri")),
					strtolower(_("Feniixis")),
					strtolower(_("FireeBee")),
					strtolower(_("Flike")),
					strtolower(_("GhostSlicer")),
					strtolower(_("Hartvile")),
					strtolower(_("Krabulous")),
					strtolower(_("Nightwing")),
					strtolower(_("Plantsy")),
					strtolower(_("Pluff")),
					strtolower(_("ReeBee")),
					strtolower(_("Reemon")),
					strtolower(_("Skelestorm")),
					strtolower(_("Strab")),
				))) // Prevent access of unwanted variables
		{
			return true;
		}
	}
	$action = explode('(', $actionWithPars)[0];
	if (strpos($contents, '(') === false)
	{
		$pars = null;
	}
	else
	{
		$pars = explode('(', $actionWithPars)[1];
		$pars = explode(')', $pars)[0];
		$pars = explode(',', $pars);
	}
	return false;
}
