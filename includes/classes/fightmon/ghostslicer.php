<?php

namespace iMagine;

class ghostslicer extends fightmon
{

// Allows Ghost Slicer-specific functions to be implimented in later versions
	public $energy = FTGR_GHOST_SLICER_STARTING_ENERGY;
	public $moves = array('bladeburst' => array('accuracy' => FTGR_BLADEBURST_ACCURACY, 'power' => FTGR_BLADEBURST_POWER, 'has_target' => TRUE));

	public function bladeburst($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Blade Burst"), FTGR_BLADEBURST_POWER, FTGR_BLADEBURST_ACCURACY, $args[0]);
	}

}
