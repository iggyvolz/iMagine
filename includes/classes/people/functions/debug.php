<?php

namespace people_functions;

trait debug
{
	public function debug($arg=null,...$excess)
	{
		global $iMagine;
		if (!IMAGINE_DEBUG)
		{
			return array(\iMagine\_('Sorry, debug mode has been disabled by an administrator.'));
		}
		if ($arg===null)
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
		if ($arg == 'on')
		{
			return $this->_debug_on();
		}
		else
		{
			return $this->_debug_off();
		}
	}
}
