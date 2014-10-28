<?php

namespace iMagine;

class reemon extends fightmon
{

// Allows Reemon-specific functions to be implimented in later versions
	public $energy = FTGR_REEMON_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => FTGR_BITE_ACCURACY, 'power' => FTGR_BITE_POWER_REEMON, 'has_target' => TRUE), 'deroot' => array('accuracy' => FTGR_DEROOT_ACCURACY, 'power' => FTGR_DEROOT_POWER, 'has_target' => FALSE), 'needlethorn' => array('accuracy' => FTGR_NEEDLETHORN_ACCURACY, 'power' => FTGR_NEEDLETHORN_POWER, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), FTGR_BITE_POWER_REEMON, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function deroot($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("De-root"), FTGR_DEROOT_POWER, FTGR_DEROOT_ACCURACY);
	}

	public function needlethorn($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Needle Thorn"), FTGR_NEEDLETHORN_POWER, FTGR_NEEDLETHORN_ACCURACY, $args[0]);
	}

}
