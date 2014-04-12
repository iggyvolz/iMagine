<?php

namespace ftgr;

class strab extends fightmon
{

// Allows Strab-specific functions to be implimented in later versions
	public $energy = FTGR_STRAB_STARTING_ENERGY;

	public function fireflare($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("Fire Flare"), FTGR_FIREFLARE_POWER, FTGR_FIREFLARE_ACCURACY, $args[0]);
	}

}
