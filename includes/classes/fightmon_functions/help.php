<?php

namespace ftgr_functions;

trait help
{
	public function help($args = NULL)
	{
		define('FTGR_HELP', TRUE);
		return array(\ftgr\_('Opened help.'));
	}
}