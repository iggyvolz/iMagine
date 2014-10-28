<?php

namespace iMagine_functions;

trait _cutscene
{
	public function _cutscene($args = NULL)
	{
		$_SESSION['iMagine']['cutscene'] = $args[0];
		@define('IMAGINE_SHOW_CUTSCENE', TRUE);
	}
}