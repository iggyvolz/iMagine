<?php

namespace iMagine_functions;

trait help
{
	public function help($args = NULL)
	{
		define('IMAGINE_HELP', TRUE);
		return array(\ftgr\_('Opened help.'));
	}
}