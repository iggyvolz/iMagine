<?php

class reemon extends fightmon
{

// Allows Reemon-specific functions to be implimented in later versions
	public $energy = FTGR_REEMON_STARTING_ENERGY;

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
