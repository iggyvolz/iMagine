<?php

class pluff extends fightmon
{

// Allows Pluff-specific functions to be implimented in later versions
	public $energy = FTGR_PLUFF_STARTING_ENERGY;
	public $moves = array('staticshock' => array('accuracy' => FTGR_STATICSHOCK_ACCURACY, 'power' => FTGR_STATICSHOCK_POWER, 'has_target' => TRUE), 'trample' => array('accuracy' => FTGR_TRAMPLE_ACCURACY, 'power' => FTGR_TRAMPLE_POWER_LOW, 'has_target' => TRUE));

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
