<?php

class plantsy extends fightmon
{

// Allows Plantsy-specific functions to be implimented in later versions
	public $energy = FTGR_PLANTSY_STARTING_ENERGY;

	public function metalpetal($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Metal Petal"), FTGR_METALPETAL_POWER, FTGR_METALPETAL_ACCURACY, $args[0]);
	}

	public function tailwhip($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Tail Whip"), FTGR_TAILWHIP_POWER, FTGR_TAILWHIP_ACCURACY, $args[0]);
	}

}
