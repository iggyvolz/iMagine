<?php

class plantsy extends fightmon
{

// Allows Nightwing-specific functions to be implimented in later versions
	public $energy = FTGR_PLANTSY_STARTING_ENERGY;

	public function metalpetal($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_METALPETAL_NAME, FTGR_METALPETAL_POWER, FTGR_METALPETAL_ACCURACY, $args[0]);
	}

	public function tailwhip($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_TAILWHIP_NAME, FTGR_TAILWHIP_POWER, FTGR_TAILWHIP_ACCURACY, $args[0]);
	}

}
