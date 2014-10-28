<?php

namespace iMagine;

class reebee extends fightmon
{

// Allows Ree bee-specific functions to be implimented in later versions
	public $energy = IMAGINE_REE_BEE_STARTING_ENERGY;
	public $moves = array('antennabeams' => array('accuracy' => IMAGINE_ANTENNABEAMS_ACCURACY, 'power' => IMAGINE_ANTENNABEAMS_POWER), 'bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_REE_BEE, 'has_target' => TRUE), 'flyby' => array('accuracy' => IMAGINE_FLYBY_ACCURACY, 'power' => IMAGINE_FLYBY_POWER_REE_BEE, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_REE_BEE, 'has_target' => TRUE), 'sting' => array('accuracy' => IMAGINE_STING_ACCURACY, 'power' => IMAGINE_STING_POWER_REE_BEE, 'has_target' => TRUE));

	public function antennabeams($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Antenna beams"), IMAGINE_ANTENNABEAMS_POWER, IMAGINE_ANTENNABEAMS_ACCURACY, $args[0]);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_REE_BEE, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function flyby($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Fly By"), IMAGINE_FLYBY_POWER_REE_BEE, IMAGINE_FLYBY_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_REE_BEE, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

	public function sting($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Sting"), IMAGINE_STING_POWER_REE_BEE, IMAGINE_STING_ACCURACY, $args[0]);
	}

}
