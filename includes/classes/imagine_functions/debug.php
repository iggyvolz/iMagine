<?php

namespace iMagine_functions;

trait debug
{
	public function debug($args = NULL)
	{
		if (!IMAGINE_DEBUG)
		{
			return array(\ftgr\_('Sorry, debug mode has been disabled by an administrator.'));
		}
		if (func_num_args() == 0 AND $_SESSION['iMagine']['debug'])
		{
			return $this->_debug_off();
		}
		if (func_num_args() == 0 AND !$_SESSION['iMagine']['debug'])
		{
			return $this->_debug_on();
		}
		if ($args[0] == 'on')
		{
			return $this->_debug_on();
		}
		if ($args[0] == 'off')
		{
			return $this->_debug_off();
		}
		if ($_SESSION['iMagine']['debug'])
		{
			return $this->_debug_off();
		}
		if (!$_SESSION['iMagine']['debug'])
		{
			return $this->_debug_on();
		}
	}
}