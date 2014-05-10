<?php

namespace ftgr_functions;

trait update_code
{
	public function update_code($args = NULL)
	{
		if ($args === NULL)
		{
			return array(\ftgr\_('This function requires a parameter.  Please see the documentation.'));
		}
		if ($args[0] === strtolower(FTGR_UPDATE_CODE))
		{
			return array(\ftgr\_('Your update code has been accepted.  Please proceed with update.'));
			$_SESSION['ftgr']['valid_session'] = TRUE;
		}
		return array(\ftgr\_('Your update code has been denied.  Please ensure you typed it correctly.'));
	}
}