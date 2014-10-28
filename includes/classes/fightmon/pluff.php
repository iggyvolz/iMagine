<?php

namespace iMagine;

class pluff extends fightmon
{

// Allows Pluff-specific functions to be implimented in later versions
	public $energy = IMAGINE_PLUFF_STARTING_ENERGY;
	public $moves = array('staticshock' => array('accuracy' => IMAGINE_STATICSHOCK_ACCURACY, 'power' => IMAGINE_STATICSHOCK_POWER, 'has_target' => TRUE), 'trample' => array('accuracy' => IMAGINE_TRAMPLE_ACCURACY, 'power' => IMAGINE_TRAMPLE_POWER_LOW, 'has_target' => TRUE));

	public function staticshock($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Static Shock"), IMAGINE_STATICSHOCK_POWER, IMAGINE_STATICSHOCK_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Trample"), IMAGINE_TRAMPLE_POWER_LOW, IMAGINE_TRAMPLE_ACCURACY, $args[0]);
	}

}
