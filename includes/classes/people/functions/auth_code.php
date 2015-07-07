<?php

namespace people_functions;

trait auth_code
{
	public function auth_code($arg=NULL,...$excess)
	{
		return array(\iMagine\_("The update functions have been removed temporarily due to changes in iMagine's structure."));
		global $iMagine;
		if ($arg === NULL)
		{
			return array(\iMagine\_('This function requires a parameter.  Please see the documentation.'));
		}
		if ($arg === strtolower(IMAGINE_UPDATE_CODE))
		{
			return array(\iMagine\_('Your authorization code has been accepted.  You may proceed.'));
			$iMagine->valid_session=TRUE;
		}
		return array(\iMagine\_('Your authorization code has been denied.  Please ensure you typed it correctly.'));
	}
}
