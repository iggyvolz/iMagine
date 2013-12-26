<?php

$avaliable_battles = array();

class battle
{

	public $opponents = array(); // Defined in child class
	public $opponents_count = 0; // Defined in _construct()

	public function _construct() // Must be called last from child class
	{
		global $battle;
		if (!isset($this->opponents))
		{
			throw new Exception(_('Cannot call battle class directly.'));
			return;
		}
		if (get_class() === get_class($this))
		{
			throw new Exception(_('Cannot call battle class directly.'));
			return;
		}
		$this->opponents_count = count($this->opponents);
		if (defined('FTGR_BATTLE_CHOSEN'))
		{
			throw new Exception(_('Battle') . ' ' . _(get_class($GLOBALS['battle']) . ' ' . _('already selected') . ', ' . _('tried to select') . ' ' . _(get_class($this))));
			return;
		}
		define('FTGR_BATTLE_CHOSEN', TRUE);
		$battle = $this;
	}

	public function pick_move($num)
	{
		$opponent = $this->opponents[$num];
		return $opponent->moves[rand(0, count($opponent->moves) - 1)];
	}

}
