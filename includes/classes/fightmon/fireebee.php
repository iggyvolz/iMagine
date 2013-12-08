<?php

class fireebee extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = FTGR_DRAGIRI_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BITE_NAME, FTGR_BITE_POWER_FIREE_BEE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_FLYBY_NAME, FTGR_FLYBY_POWER_FIREE_BEE, FTGR_FLYBY_ACCURACY, $args[0]);
	}

	public function hornit($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_HORNIT_NAME, rand(FTGR_HORNIT_POWER_MIN, FTGR_HORNIT_POWER_MAX), FTGR_HORNIT_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_SCRATCH_NAME, FTGR_SCRATCH_POWER_FIREE_BEE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_STING_NAME, FTGR_STING_POWER_FIREE_BEE, FTGR_STING_ACCURACY, $args[0]);
	}

}
