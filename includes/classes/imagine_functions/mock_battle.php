<?php

namespace iMagine_functions;

trait mock_battle
{

	public function mock_battle($args = NULL)
	{
		global $battle, $avaliable_battles;
		if (isset($args[0]) && in_array($args[0], $avaliable_battles))
		{
			$_SESSION['iMagine']['battle'] = $args[0];
			return array(\ftgr\_(sprintf("Battle %s now loaded!", $args[0])));
		}
		return array(\ftgr\_('Error: Invalid battle'));
	}

}
