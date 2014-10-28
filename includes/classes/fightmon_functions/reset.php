<?php

namespace iMagine_functions;

trait reset
{
	public function reset($args = NULL)
	{
		global $initial_session;
		session_destroy();
		$_SESSION['ftgr'] = $initial_session;
		define('IMAGINE_REFRESH', TRUE);
		return array('');
	}
}