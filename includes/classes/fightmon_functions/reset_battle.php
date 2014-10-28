<?php

namespace iMagine_functions;

trait reset_battle
{
	public function reset_battle($args = NULL)
	{
		$GLOBALS['battle'] = NULL;
		$_SESSION['iMagine']['battle'] = NULL;
		return array(\ftgr\_('Successfully reset battle!'));
	}
}