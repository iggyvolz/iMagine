<?php

class dragiri extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = FTGR_DRAGIRI_STARTING_ENERGY;

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BITE_NAME, rand(FTGR_BITE_POWER_DRAGIRI_MIN, FTGR_BITE_POWER_DRAGIRI_MAX), FTGR_BITE_ACCURACY, $args[0]);
	}

	public function stomp($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_STOMP_NAME, FTGR_STOMP_POWER_LOW, FTGR_STOMP_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_TRAMPLE_NAME, FTGR_TRAMPLE_POWER_LOW, FTGR_TRAMPLE_ACCURACY, $args[0]);
	}

	public function windwhap($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_WIND_WHAP_NAME, FTGR_WIND_WHAP_POWER, FTGR_WIND_WHAP_ACCURACY, $args[0]);
	}

}
