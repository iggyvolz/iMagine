<?php

namespace iMagine;

class fireebee extends fightmon
{

// Allows Firee bee-specific functions to be implimented in later versions
	public $energy = IMAGINE_FIREE_BEE_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_FIREE_BEE, 'has_target' => TRUE), 'flyby' => array('accuracy' => IMAGINE_FLYBY_ACCURACY, 'power' => IMAGINE_FLYBY_POWER_FIREE_BEE, 'has_target' => TRUE), 'hornit' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_FENIIXIS, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_FIREE_BEE, 'has_target' => TRUE), 'sting' => array('accuracy' => IMAGINE_STING_ACCURACY, 'power' => IMAGINE_STING_POWER_FIREE_BEE, 'has_target' => TRUE));

	public function __construct()
	{
		parent::__construct();
		$this->moves['hornit']['power'] = rand(IMAGINE_HORNIT_POWER_MIN, IMAGINE_HORNIT_POWER_MAX);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_FIREE_BEE, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Fly By"), IMAGINE_FLYBY_POWER_FIREE_BEE, IMAGINE_FLYBY_ACCURACY, $args[0]);
	}

	public function hornit($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Hornit"), rand(IMAGINE_HORNIT_POWER_MIN, IMAGINE_HORNIT_POWER_MAX), IMAGINE_HORNIT_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_FIREE_BEE, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Sting"), IMAGINE_STING_POWER_FIREE_BEE, IMAGINE_STING_ACCURACY, $args[0]);
	}

}
