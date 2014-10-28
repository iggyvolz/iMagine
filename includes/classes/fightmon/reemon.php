<?php

namespace iMagine;

class reemon extends fightmon
{

// Allows Reemon-specific functions to be implimented in later versions
	public $energy = IMAGINE_REEMON_STARTING_ENERGY;
	public $moves = array('bite' => array('accuracy' => IMAGINE_BITE_ACCURACY, 'power' => IMAGINE_BITE_POWER_REEMON, 'has_target' => TRUE), 'deroot' => array('accuracy' => IMAGINE_DEROOT_ACCURACY, 'power' => IMAGINE_DEROOT_POWER, 'has_target' => FALSE), 'needlethorn' => array('accuracy' => IMAGINE_NEEDLETHORN_ACCURACY, 'power' => IMAGINE_NEEDLETHORN_POWER, 'has_target' => TRUE));

	public function bite($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Bite"), IMAGINE_BITE_POWER_REEMON, IMAGINE_BITE_ACCURACY, $args[0]);
	}

	public function deroot($args = NULL)
	{
		// Needs custom code
		return $this->_move(_("De-root"), IMAGINE_DEROOT_POWER, IMAGINE_DEROOT_ACCURACY);
	}

	public function needlethorn($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_("This function requires a parameter.  Please see the documentation."));
		}
		return $this->_move(_("Needle Thorn"), IMAGINE_NEEDLETHORN_POWER, IMAGINE_NEEDLETHORN_ACCURACY, $args[0]);
	}

}
