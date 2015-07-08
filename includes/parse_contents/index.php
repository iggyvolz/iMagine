<?php

namespace iMagine;

function parse_contents($contents)
{
	global $iMagine;
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
	return [$person,$action,$pars];
}
