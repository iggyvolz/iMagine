<?php

namespace iMagine;

class strab extends fightmon
{

// Allows Strab-specific functions to be implimented in later versions
	public $energy = FTGR_STRAB_STARTING_ENERGY;
	public $moves = array('fireflare' => array('accuracy' => FTGR_FIREFLARE_ACCURACY, 'power' => FTGR_FIREFLARE_POWER, 'has_target' => FALSE));

	public function fireflare($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("Fire Flare"), FTGR_FIREFLARE_POWER, FTGR_FIREFLARE_ACCURACY, $args[0]);
	}

}
