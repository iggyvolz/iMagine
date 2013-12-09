<?php

class hartvile extends fightmon
{

// Allows Hartvile-specific functions to be implimented in later versions
	public $energy = FTGR_HARTVILE_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BITE_NAME, FTGR_BITE_POWER_HARTVILE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function daze($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_DAZE_NAME, FTGR_DAZE_POWER, FTGR_DAZE_ACCURACY, $args[0]);
	}

	public function lovesfall($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_LOVESFALL_NAME, FTGR_LOVESFALL_POWER, FTGR_LOVESFALL_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_SCRATCH_NAME, FTGR_SCRATCH_POWER_HARTVILE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

}
