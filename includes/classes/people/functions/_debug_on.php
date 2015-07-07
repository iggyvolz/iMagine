<?php

namespace people_functions;

trait _debug_on
{
	public function _debug_on($args = NULL)
	{
		global $iMagine;
		$iMagine->debug=TRUE;
		return array(\iMagine\_('Debug mode is now on.'));
	}
}
