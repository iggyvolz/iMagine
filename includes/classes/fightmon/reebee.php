<?php

class reebee extends fightmon
{

// Allows Ree bee-specific functions to be implimented in later versions
	public $energy = FTGR_REE_BEE_STARTING_ENERGY;

	public function antennabeams($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Antenna beams"), FTGR_ANTENNABEAMS_POWER, FTGR_ANTENAEBEAMS_ACCURACY, $args[0]);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), FTGR_BITE_POWER_REE_BEE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Fly By"), FTGR_FLYBY_POWER_REE_BEE, FTGR_FLYBY_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_REE_BEE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Sting"), FTGR_STING_POWER_REE_BEE, FTGR_STING_ACCURACY, $args[0]);
	}

}
