<?php

class nightwing extends fightmon
{

// Allows Nightwing-specific functions to be implimented in later versions
	public $energy = FTGR_NIGHTWING_STARTING_ENERGY;

	public function airram($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_AIRRAM_NAME, FTGR_AIRRAM_POWER, FTGR_AIRRAM_ACCURACY, $args[0]);
	}

	public function echolocate($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_ECHOLOCATE_NAME, FTGR_ECHOLOCATE_POWER, FTGR_ECHOLOCATE_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_SCRATCH_NAME, FTGR_SCRATCH_POWER_NIGHTWING, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

}
