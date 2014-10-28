<?php

namespace iMagine;

class plantsy extends fightmon
{

// Allows Plantsy-specific functions to be implimented in later versions
	public $energy = IMAGINE_PLANTSY_STARTING_ENERGY;
	public $moves = array('metalpetal' => array('accuracy' => IMAGINE_METALPETAL_ACCURACY, 'power' => IMAGINE_METALPETAL_POWER));

	public function metalpetal($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Metal Petal"), IMAGINE_METALPETAL_POWER, IMAGINE_METALPETAL_ACCURACY, $args[0]);
	}

	public function tailwhip($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Tail Whip"), IMAGINE_TAILWHIP_POWER, IMAGINE_TAILWHIP_ACCURACY, $args[0]);
	}

}
