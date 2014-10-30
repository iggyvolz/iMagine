<?php

namespace iMagine_functions;

trait auth_code
{
	public function auth_code($args = NULL)
	{
		//return array(\iMagine\_("WARNING - The Update function has been removed until further notice due to changes in FTG:R's structure.  Please check the dev-update branch for development of this feature."));
		if ($args === NULL)
		{
			return array(\iMagine\_('This function requires a parameter.  Please see the documentation.'));
		}
		if ($args[0] === strtolower(IMAGINE_UPDATE_CODE))
		{
			return array(\iMagine\_('Your authorization code has been accepted.  You may proceed.'));
			$_SESSION['iMagine']['valid_session'] = TRUE;
		}
		return array(\iMagine\_('Your authorization code has been denied.  Please ensure you typed it correctly.'));
	}
}