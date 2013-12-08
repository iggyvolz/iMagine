<?php

class reebee extends fightmon
{

// Allows Reemon-specific functions to be implimented in later versions
	public $energy = FTGR_REE_BEE_STARTING_ENERGY;

	public function anntenaebeams($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_ANNTENAEBEAMS_NAME, FTGR_ANNTENAEBEAMS_POWER, FTGR_ANNTENAEBEAMS_ACCURACY, $args[0]);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BITE_NAME, FTGR_BITE_POWER_REE_BEE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_FLYBY_NAME, FTGR_FLYBY_POWER_REE_BEE, FTGR_FLYBY_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_SCRATCH_NAME, FTGR_SCRATCH_POWER_REE_BEE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_STING_NAME, FTGR_STING_POWER_REE_BEE, FTGR_STING_ACCURACY, $args[0]);
	}

}
