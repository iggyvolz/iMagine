<?php

namespace iMagine;

class hartvile extends fightmon
{

// Allows Hartvile-specific functions to be implimented in later versions
	public $energy = IMAGINE_HARTVILE_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_HARTVILE, 'has_target' => TRUE), 'daze' => array('accuracy' => IMAGINE_DAZE_ACCURACY, 'power' => IMAGINE_DAZE_POWER, 'has_target' => TRUE), 'lovesfall' => array('accuracy' => IMAGINE_LOVESFALL_ACCURACY, 'power' => IMAGINE_LOVESFALL_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_HARTVILE, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_HARTVILE, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function daze($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Daze"), IMAGINE_DAZE_POWER, IMAGINE_DAZE_ACCURACY, $args[0]);
	}

	public function lovesfall($args = NULL)
	{
		// Needs custom code
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Love's Fall"), IMAGINE_LOVESFALL_POWER, IMAGINE_LOVESFALL_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_HARTVILE, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

}
