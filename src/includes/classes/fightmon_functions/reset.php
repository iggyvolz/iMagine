<?php

namespace ftgr_functions;

trait reset
{
	public function reset($args = NULL)
	{
		global $initial_session;
		session_destroy();
		$_SESSION['ftgr'] = $initial_session;
		define('FTGR_REFRESH', TRUE);
		return array('');
	}
}