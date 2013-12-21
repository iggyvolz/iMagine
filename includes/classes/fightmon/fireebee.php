<?php

class fireebee extends fightmon
{

// Allows Firee bee-specific functions to be implimented in later versions
	public $energy = FTGR_FIREE_BEE_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), FTGR_BITE_POWER_FIREE_BEE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Fly By"), FTGR_FLYBY_POWER_FIREE_BEE, FTGR_FLYBY_ACCURACY, $args[0]);
	}

	public function hornit($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Hornit"), rand(FTGR_HORNIT_POWER_MIN, FTGR_HORNIT_POWER_MAX), FTGR_HORNIT_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_FIREE_BEE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Sting"), FTGR_STING_POWER_FIREE_BEE, FTGR_STING_ACCURACY, $args[0]);
	}

}
