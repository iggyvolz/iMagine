<?php

namespace ftgr_functions;

trait cutscene
{
	public function cutscene($args = NULL) // Public wrapper for _cutscene, delete before production
	{
		call_user_func(array($this, '_cutscene'), $args);
		return array(sprintf(\ftgr\_('Calling cutscene "%s"'), htmlentities($args[0], ENT_QUOTES)));
	}
}