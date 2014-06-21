<?php

namespace ftgr;

class krabulous extends fightmon
{

// Allows Strab-specific functions to be implimented in later versions
	public $energy = FTGR_KRABULOUS_STARTING_ENERGY;
	public $moves = array('projectiles' => array('accuracy' => FTGR_PROJECTILES_ACCURACY, 'power' => FTGR_PROJECTILES_POWER, 'has_target' => TRUE));

	public function projectiles($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("Projectiles"), FTGR_PROJECTILES_POWER, FTGR_PROJECTILES_ACCURACY, $args[0]);
	}

}
