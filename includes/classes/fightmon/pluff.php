<?php

namespace ftgr;

class pluff extends fightmon
{

// Allows Pluff-specific functions to be implimented in later versions
	public $energy = FTGR_PLUFF_STARTING_ENERGY;

	public function staticshock($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Static Shock"), FTGR_STATICSHOCK_POWER, FTGR_STATICSHOCK_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Trample"), FTGR_TRAMPLE_POWER_LOW, FTGR_TRAMPLE_ACCURACY, $args[0]);
	}

}
