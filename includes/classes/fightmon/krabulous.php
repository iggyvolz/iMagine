<?php

namespace iMagine;

class krabulous extends fightmon
{

// Allows Strab-specific functions to be implimented in later versions
	public $energy = IMAGINE_KRABULOUS_STARTING_ENERGY;
	public $moves = array('projectiles' => array('accuracy' => IMAGINE_PROJECTILES_ACCURACY, 'power' => IMAGINE_PROJECTILES_POWER, 'has_target' => TRUE));

	public function projectiles($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("Projectiles"), IMAGINE_PROJECTILES_POWER, IMAGINE_PROJECTILES_ACCURACY, $args[0]);
	}

}
