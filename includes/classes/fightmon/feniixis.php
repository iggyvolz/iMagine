<?php

class feniixis extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = FTGR_FENIIXIS_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => FTGR_BITE_ACCURACY, 'power' => FTGR_BITE_POWER_FENIIXIS, 'has_target' => TRUE), 'burn' => array('accuracy' => FTGR_BURN_ACCURACY, 'power' => FTGR_BURN_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => FTGR_SCRATCH_ACCURACY, 'power' => FTGR_SCRATCH_POWER_FENIIXIS, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), FTGR_BITE_POWER_FENIIXIS, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function burn($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Burn"), FTGR_BURN_POWER, FTGR_BURN_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Scratch"), FTGR_SCRATCH_POWER_FENIIXIS, FTGR_STOMP_ACCURACY, $args[0]);
	}

}
