<?php

class fightmon
{

	public function __construct()
	{
		global $nechka, $shade, $apparition;
		$owner = $this->owner;
		$$owner->register(get_class($this));
		if (isset($_SESSION['ftgr'][get_class($this) . 'energy']))
		{
			$this->energy = $_SESSION['ftgr'][get_class($this) . 'energy'];
		}
		$_SESSION['ftgr'][get_class($this) . 'energy'];
	}

	public function __destruct()
	{
		$_SESSION['ftgr'][get_class($this) . 'energy'] = $this->energy;
	}

//More functions are to be added in the future
}

class reemon extends fightmon
{

	// Allows Reemon-specific functions to be implimented in later versions
	public $owner = 'nechka';
	public $energy = FTGR_REEMON_STARTING_ENERGY;

}

class pluff extends fightmon
{

	// Allows Pluff-specific functions to be implimented in later versions
	public $owner = 'shade';
	public $energy = FTGR_PLUFF_STARTING_ENERGY;

}

class dragiri extends fightmon
{

	// Allows Dragiri-specific functions to be implimented in later versions
	public $owner = 'apparition';
	public $energy = FTGR_DRAGIRI_STARTING_ENERGY;

}
