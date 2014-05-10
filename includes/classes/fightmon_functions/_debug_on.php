<?php

namespace ftgr_functions;

trait _debug_on
{
	public function _debug_on($args = NULL)
	{
		$_SESSION['ftgr']['debug'] = TRUE;
		return array(\ftgr\_('Debug mode is now on.'));
	}
}