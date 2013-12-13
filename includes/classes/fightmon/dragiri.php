<?php

class dragiri extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = FTGR_DRAGIRI_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), rand(FTGR_BITE_POWER_DRAGIRI_MIN, FTGR_BITE_POWER_DRAGIRI_MAX), FTGR_BITE_ACCURACY, $args[0]);
	}

	public function stomp($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Stomp"), FTGR_STOMP_POWER_LOW, FTGR_STOMP_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Trample"), FTGR_TRAMPLE_POWER_LOW, FTGR_TRAMPLE_ACCURACY, $args[0]);
	}

	public function windwhap($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Wind Whap"), FTGR_WIND_WHAP_POWER, FTGR_WIND_WHAP_ACCURACY, $args[0]);
	}

}
