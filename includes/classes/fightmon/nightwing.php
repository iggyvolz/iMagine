<?php

namespace iMagine;

class nightwing extends fightmon
{

// Allows Nightwing-specific functions to be implimented in later versions
	public $energy = IMAGINE_NIGHTWING_STARTING_ENERGY;
	public $moves = array('airram' => array('accuracy' => IMAGINE_AIRRAM_ACCURACY, 'power' => IMAGINE_AIRRAM_POWER_NIGHTWING, 'has_target' => TRUE), 'echolocate' => array('accuracy' => IMAGINE_ECHOLOCATE_ACCURACY, 'power' => IMAGINE_ECHOLOCATE_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_NIGHTWING, 'has_target' => TRUE));

	public function airram($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Air Ram"), IMAGINE_AIRRAM_POWER_NIGHTWING, IMAGINE_AIRRAM_ACCURACY, $args[0]);
	}

	public function echolocate($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Echo Locate"), IMAGINE_ECHOLOCATE_POWER, IMAGINE_ECHOLOCATE_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_NIGHTWING, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

}
