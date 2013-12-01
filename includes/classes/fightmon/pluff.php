<?php

class pluff extends fightmon
{

// Allows Pluff-specific functions to be implimented in later versions
	public $energy = FTGR_PLUFF_STARTING_ENERGY;

	public function staticshock($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_STATICSHOCK_NAME, FTGR_STATICSHOCK_POWER, FTGR_STATICSHOCK_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_TRAMPLE_NAME, FTGR_TRAMPLE_POWER_LOW, FTGR_TRAMPLE_ACCURACY, $args[0]);
	}

}
