<?php

class nightwing extends fightmon
{

// Allows Nightwing-specific functions to be implimented in later versions
	public $energy = FTGR_NIGHTWING_STARTING_ENERGY;
	public $moves = array('airram' => array('accuracy' => FTGR_AIRRAM_ACCURACY, 'power' => FTGR_AIRRAM_POWER_NIGHTWING, 'has_target' => TRUE), 'echolocate' => array('accuracy' => FTGR_ECHOLOCATE_ACCURACY, 'power' => FTGR_ECHOLOCATE_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => FTGR_SCRATCH_ACCURACY, 'power' => FTGR_SCRATCH_POWER_NIGHTWING, 'has_target' => TRUE));

	public function airram($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Air Ram"), FTGR_AIRRAM_POWER_NIGHTWING, FTGR_AIRRAM_ACCURACY, $args[0]);
	}

	public function echolocate($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Echo Locate"), FTGR_ECHOLOCATE_POWER, FTGR_ECHOLOCATE_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_NIGHTWING, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

}
