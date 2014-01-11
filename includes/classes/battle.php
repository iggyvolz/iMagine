<?php

$avaliable_battles = array();

class battle
{

	public $opponents = array(); // Defined in child class
	public $opponents_count = 0; // Defined in __construct()

	public function __construct()
	{
		global $battle;
		if (get_class() === get_class($this))
		{
			throw new Exception(_('Cannot call battle class directly.'));
			return;
		}
		$this->opponents_count = count($this->opponents);
		if (defined('FTGR_BATTLE_CHOSEN'))
		{
			throw new Exception(str_replace(array('%1', '%2'), array(get_class($GLOBALS['battle']), _(get_class($this))), _('Battle %1 already selected, tried to select %2.')));
			return;
		}
		define('FTGR_BATTLE_CHOSEN', TRUE);
		$battle = $this;
	}

	public function pick_move($num)
	{
		global $fightmon, $returned;
		$opponent = $this->opponents[$num];
		$move_num = rand(0, count($opponent->moves) - 1);
		$move = itemOf(array_keys($opponent->moves), $move_num);
		$accuracy = itemOf(itemOf(array_values($opponent->moves), $move_num), 'accuracy');
		$power = itemOf(itemOf(array_values($opponent->moves), $move_num), 'power');
		$has_target = itemOf(itemOf(array_values($opponent->moves), $move_num), 'has_target');
		foreach ($fightmon as $possibletarget)
		{
			if ($GLOBALS[$possibletarget]->energy > 0)
			{
				$possibletargets[] = $possibletarget;
			}
		}
		if (empty($possibletargets))
		{
			return NULL;
		}
		else
		{
			if ($has_target)
			{
				$target = $possibletargets[rand(0, count($possibletargets) - 1)];
				$targetobj = $GLOBALS[$target];
				if ($targetobj->_move_internal($accuracy))
				{
					$returned[] = str_replace(array('%1', '%2', '%3', '%4'), array(ucfirst(get_class($this->opponents[$num])), $move, ucfirst($target), $power), _('The opponent\'s %1 used %2 on %3 and it caused %4 damage!'));
					if ($targetobj->energy > $power)
					{
						$targetobj->energy-=$power;
					}
					else
					{
						$targetobj->energy = 0;
						$returned[] = str_replace(array('%1'), array(ucfirst($target)), _('%1 fainted!'));
					}
				}
				else
				{
					$returned[] = str_replace(array('%1', '%2', '%3'), array(ucfirst(get_class($this->opponents[$num])), $move, ucfirst($target), $power), _('The opponent\'s %1 used %2 on %3 and it missed!'));
				}
			}
			else
			{
				if ($GLOBALS['fightmon'][0]->_move_internal($accuracy))
				{
					$returned[] = str_replace(array('%1', '%2', '%3', '%4'), array(ucfirst(get_class($this->opponents[$num])), $move), _('The opponent\'s %1 used %2!'));
				}
				else
				{
					$returned[] = str_replace(array('%1', '%2'), array(ucfirst(get_class($this->opponents[$num])), $move), _('The opponent\'s %1 used %2 and it missed!'));
				}
			}
		}
		return $returned;
	}

}
