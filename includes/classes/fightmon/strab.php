<?php

namespace iMagine;

class strab extends fightmon
{

// Allows Strab-specific functions to be implimented in later versions
	public $energy = IMAGINE_STRAB_STARTING_ENERGY;
	public $moves = array('fireflare' => array('accuracy' => IMAGINE_FIREFLARE_ACCURACY, 'power' => IMAGINE_FIREFLARE_POWER, 'has_target' => FALSE));

	public function fireflare($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("Fire Flare"), IMAGINE_FIREFLARE_POWER, IMAGINE_FIREFLARE_ACCURACY, $args[0]);
	}

}
