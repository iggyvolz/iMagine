<?php

class ghostslicer extends fightmon
{

// Allows Dragiri-specific functions to be implimented in later versions
	public $energy = FTGR_GHOST_SLICER_STARTING_ENERGY;

	public function bladeburst($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		return $this->_move(FTGR_BLADEBURST_NAME, FTGR_BLADEBURST_POWER, FTGR_BLADEBURST_ACCURACY, $args[0]);
	}

}
