<?php

namespace iMagine;

class feniixis extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = IMAGINE_FENIIXIS_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_FENIIXIS, 'has_target' => TRUE), 'burn' => array('accuracy' => IMAGINE_BURN_ACCURACY, 'power' => IMAGINE_BURN_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_FENIIXIS, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), IMAGINE_BITE_POWER_FENIIXIS, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function burn($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Burn"), IMAGINE_BURN_POWER, IMAGINE_BURN_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_FENIIXIS, IMAGINE_STOMP_ACCURACY, $args[0]);
	}

}
