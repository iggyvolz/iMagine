<?php

namespace iMagine;

class ghostslicer extends fightmon
{

// Allows Ghost Slicer-specific functions to be implimented in later versions
	public $energy = IMAGINE_GHOST_SLICER_STARTING_ENERGY;
	public $moves = array('bladeburst' => array('accuracy' => IMAGINE_BLADEBURST_ACCURACY, 'power' => IMAGINE_BLADEBURST_POWER, 'has_target' => TRUE));

	public function bladeburst($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Blade Burst"), IMAGINE_BLADEBURST_POWER, IMAGINE_BLADEBURST_ACCURACY, $args[0]);
	}

}
