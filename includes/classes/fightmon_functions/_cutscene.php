<?php

namespace ftgr_functions;

trait _cutscene
{
	public function _cutscene($args = NULL)
	{
		$_SESSION['ftgr']['cutscene'] = $args[0];
		@define('FTGR_SHOW_CUTSCENE', TRUE);
	}
}