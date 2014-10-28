<?php

namespace iMagine;

class flike extends fightmon
{

// Allows Flike-specific functions to be implimented in later versions
	public $energy = IMAGINE_FLIKE_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_FLIKE, 'has_target' => TRUE), 'kick' => array('accuracy' => IMAGINE_KICK_ACCURACY, 'power' => IMAGINE_KICK_POWER, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_FLIKE, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_FLIKE, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function kick($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Kick"), IMAGINE_KICK_POWER, IMAGINE_KICK_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_FLIKE, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

}
