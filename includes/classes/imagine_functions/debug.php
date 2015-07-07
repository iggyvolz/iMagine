<?php

namespace iMagine_functions;

trait debug
{
	public function debug($args = NULL)
	{
		global $iMagine;
		if (!IMAGINE_DEBUG)
		{
			return array(\iMagine\_('Sorry, debug mode has been disabled by an administrator.'));
		}
		if (count($args)===0)
		{
			if($iMagine->debug)
			{
				return $this->_debug_off();
			}
			else
			{
				return $this->_debug_on();
			}
		}
		if ($args[0] == 'on')
		{
			return $this->_debug_on();
		}
		else
		{
			return $this->_debug_off();
		}
		if ($iMagine->debug)
		{
			return $this->_debug_off();
		}
		else
		{
			return $this->_debug_on();
		}
	}
}
