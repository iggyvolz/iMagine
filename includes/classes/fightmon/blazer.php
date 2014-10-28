<?php

namespace iMagine;

class blazer extends fightmon
{

// Allows Blazer-specific functions to be implimented in later versions
	public $energy = FTGR_BLAZER_STARTING_ENERGY;
	public $moves = array('airram' => array('accuracy' => FTGR_AIRRAM_ACCURACY, 'power' => FTGR_AIRRAM_POWER_BLAZER, 'has_target' => TRUE), 'bite' => array('accuracy' => FTGR_BITE_ACCURACY, 'power' => FTGR_BITE_POWER_BLAZER, 'has_target' => TRUE), 'scratch' => array('accuracy' => FTGR_SCRATCH_ACCURACY, 'power' => FTGR_SCRATCH_POWER_BLAZER, 'has_target' => TRUE));

	public function airram($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Air Ram'), FTGR_AIRRAM_POWER_BLAZER, FTGR_AIRRAM_ACCURACY, $args[0]);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), FTGR_BITE_POWER_BLAZER, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_BLAZER, FTGR_SCRATCH_ACCURACY, $args[0]);
	}

}
