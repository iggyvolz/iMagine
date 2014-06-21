<?php

namespace ftgr;

class hartvile extends fightmon
{

// Allows Hartvile-specific functions to be implimented in later versions
	public $energy = FTGR_HARTVILE_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => FTGR_BITE_ACCURACY, 'power' => FTGR_BITE_POWER_HARTVILE, 'has_target' => TRUE), 'daze' => array('accuracy' => FTGR_DAZE_ACCURACY, 'power' => FTGR_DAZE_POWER, 'has_target' => TRUE), 'lovesfall' => array('accuracy' => FTGR_LOVESFALL_ACCURACY, 'power' => FTGR_LOVESFALL_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => FTGR_SCRATCH_ACCURACY, 'power' => FTGR_SCRATCH_POWER_HARTVILE, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), FTGR_BITE_POWER_HARTVILE, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function daze($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Daze"), FTGR_DAZE_POWER, FTGR_DAZE_ACCURACY, $args[0]);
	}

	public function lovesfall($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Love's Fall"), FTGR_LOVESFALL_POWER, FTGR_LOVESFALL_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_HARTVILE, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

}
