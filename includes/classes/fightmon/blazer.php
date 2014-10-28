<?php

namespace iMagine;

class blazer extends fightmon
{

// Allows Blazer-specific functions to be implimented in later versions
	public $energy = IMAGINE_BLAZER_STARTING_ENERGY;
	public $moves = array('airram' => array('accuracy' => IMAGINE_AIRRAM_ACCURACY, 'power' => IMAGINE_AIRRAM_POWER_BLAZER, 'has_target' => TRUE), 'bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_BLAZER, 'has_target' => TRUE), 'scratch' => array('accuracy' => IMAGINE_SCRATCH_ACCURACY, 'power' => IMAGINE_SCRATCH_POWER_BLAZER, 'has_target' => TRUE));

	public function airram($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Air Ram'), IMAGINE_AIRRAM_POWER_BLAZER, IMAGINE_AIRRAM_ACCURACY, $args[0]);
	}

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_('Bite'), IMAGINE_BITE_POWER_BLAZER, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function scratch($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		return $this->_move(_("Scratch"), IMAGINE_SCRATCH_POWER_BLAZER, IMAGINE_SCRATCH_ACCURACY, $args[0]);
	}

}
