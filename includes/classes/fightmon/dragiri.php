<?php

namespace iMagine;

class dragiri extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = IMAGINE_DRAGIRI_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => NULL, 'has_target' => TRUE), 'stomp' => array('accuracy' => IMAGINE_STOMP_ACCURACY, 'power' => IMAGINE_STOMP_POWER, 'has_target' => TRUE), 'trample' => array('accuracy' => IMAGINE_TRAMPLE_ACCURACY, 'power' => IMAGINE_TRAMPLE_POWER_LOW, 'has_target' => TRUE), 'windwhap' => array('accuracy' => IMAGINE_WIND_WHAP_ACCURACY, 'power' => IMAGINE_WIND_WHAP_POWER, 'has_target' => TRUE));

	public function __construct()
	{
		parent::__construct();
		$this->moves['bite']['power'] = rand(IMAGINE_BITE_POWER_DRAGIRI_MIN, IMAGINE_BITE_POWER_DRAGIRI_MAX); // Workaround for not being able to run rand() in class declaration
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), rand(IMAGINE_BITE_POWER_DRAGIRI_MIN, IMAGINE_BITE_POWER_DRAGIRI_MAX), IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function stomp($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Stomp"), IMAGINE_STOMP_POWER, IMAGINE_STOMP_ACCURACY, $args[0]);
	}

	public function trample($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Trample"), IMAGINE_TRAMPLE_POWER_LOW, IMAGINE_TRAMPLE_ACCURACY, $args[0]);
	}

	public function windwhap($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Wind Whap"), IMAGINE_WIND_WHAP_POWER, IMAGINE_WIND_WHAP_ACCURACY, $args[0]);
	}

}
