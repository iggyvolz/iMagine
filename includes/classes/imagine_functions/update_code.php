<?php

namespace iMagine_functions;

trait update_code
{
	public function update_code($args = NULL)
	{
		return array(\iMagine\_("WARNING - The Update function has been removed until further notice due to changes in FTG:R's structure.  Please check the dev-update branch for development of this feature."));
		if ($args === NULL)
		{
			return array(\iMagine\_('This function requires a parameter.  Please see the documentation.'));
		}
		if ($args[0] === strtolower(IMAGINE_UPDATE_CODE))
		{
			return array(\iMagine\_('Your update code has been accepted.  Please proceed with update.'));
			$_SESSION['iMagine']['valid_session'] = TRUE;
		}
		return array(\iMagine\_('Your update code has been denied.  Please ensure you typed it correctly.'));
	}
}