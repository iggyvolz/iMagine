<?php

namespace iMagine_functions;

trait help
{
	public function help($args = NULL)
	{
		define('IMAGINE_HELP', TRUE);
		return array(\iMagine\_('Opened help.'));
	}
}