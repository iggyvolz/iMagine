<?php

namespace iMagine;

class skelestorm extends fightmon
{

// Allows Skelestorm-specific functions to be implimented in later versions
	public $energy = IMAGINE_SKELESTORM_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_SKELESTORM, 'has_target' => TRUE), 'electroshade' => array('accuracy' => IMAGINE_ELECTROSHADE_ACCURACY, 'power' => IMAGINE_ELECTROSHADE_POWER, 'has_target' => FALSE), 'lightningstrike' => array('accuracy' => IMAGINE_LIGHTNINGSTRIKE_ACCURACY, 'power' => NULL, 'has_target' => TRUE), 'repstrike' => array('accuracy' => IMAGINE_REPSTRIKE_ACCURACY, 'power' => NULL, 'has_target' => TRUE));

	public function __construct()
	{
		parent::__construct();
		$this->moves['lightningstrike']['power'] = rand(IMAGINE_LIGHTNINGSTRIKE_POWER_MIN, IMAGINE_LIGHTNINGSTRIKE_POWER_MAX);
		$this->moves['repstrike']['power'] = rand(IMAGINE_REPSTRIKE_POWER_MIN, IMAGINE_REPSTRIKE_POWER_MAX);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_SKELESTORM, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function electroshade($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Electro-shade"), IMAGINE_ELECTROSHADE_POWER, IMAGINE_ELECTROSHADE_ACCURACY, $args[0]);
	}

	public function lightningstrike($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Lightning Strike"), rand(IMAGINE_LIGHTNINGSTRIKE_POWER_MIN, IMAGINE_LIGHTNINGSTRIKE_POWER_MAX), IMAGINE_LIGHTNINGSTRIKE_ACCURACY, $args[0]);
	}

	public function repstrike($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Rep Strike"), rand(IMAGINE_REPSTRIKE_POWER_MIN, IMAGINE_REPSTRIKE_POWER_MAX), IMAGINE_REPSTRIKE_ACCURACY, $args[0]);
	}

}
