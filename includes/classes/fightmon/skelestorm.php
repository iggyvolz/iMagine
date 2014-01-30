<?php

class skelestorm extends fightmon
{

// Allows Skelestorm-specific functions to be implimented in later versions
	public $energy = FTGR_SKELESTORM_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => FTGR_BITE_ACCURACY, 'power' => FTGR_BITE_POWER_SKELESTORM, 'has_target' => TRUE), 'electroshade' => array('accuracy' => FTGR_ELECTROSHADE_ACCURACY, 'power' => FTGR_ELECTROSHADE_POWER, 'has_target' => FALSE), 'lightningstrike' => array('accuracy' => FTGR_LIGHTNINGSTRIKE_ACCURACY, 'power' => NULL, 'has_target' => TRUE), 'repstrike' => array('accuracy' => FTGR_REPSTRIKE_ACCURACY, 'power' => NULL, 'has_target' => TRUE));

	public function __construct()
	{
		parent::__construct();
		$this->moves['lightningstrike']['power'] = rand(FTGR_LIGHTNINGSTRIKE_POWER_MIN, FTGR_LIGHTNINGSTRIKE_POWER_MAX);
		$this->moves['repstrike']['power'] = rand(FTGR_REPSTRIKE_POWER_MIN, FTGR_REPSTRIKE_POWER_MAX);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), FTGR_BITE_POWER_SKELESTORM, FTGR_BITE_ACCURACY, $args[0]);
	}

	public function electroshade($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Electro-shade"), FTGR_ELECTROSHADE_POWER, FTGR_ELECTROSHADE_ACCURACY, $args[0]);
	}

	public function lightningstrike($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Lightning Strike"), rand(FTGR_LIGHTNINGSTRIKE_POWER_MIN, FTGR_LIGHTNINGSTRIKE_POWER_MAX), FTGR_LIGHTNINGSTRIKE_ACCURACY, $args[0]);
	}

	public function repstrike($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Rep Strike"), rand(FTGR_REPSTRIKE_POWER_MIN, FTGR_REPSTRIKE_POWER_MAX), FTGR_REPSTRIKE_ACCURACY, $args[0]);
	}

}
