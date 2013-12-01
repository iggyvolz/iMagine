<?php

class reemon extends fightmon
{

// Allows Reemon-specific functions to be implimented in later versions
	public $energy = FTGR_REEMON_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BITE_NAME, FTGR_BITE_POWER_REEMON, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function deroot($args = NULL)
	{
		// Needs custom code
		return $this->_move(FTGR_DEROOT_NAME, FTGR_DEROOT_POWER, FTGR_DEROOT_ACCURACY);
	}

	public function needlethorn($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_NEEDLETHORN_NAME, FTGR_NEEDLETHORN_POWER, FTGR_NEEDLETHORN_ACCURACY, $args[0]);
	}

}
