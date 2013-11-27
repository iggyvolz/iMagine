<?php

class fightmon
{

	public function __construct()
	{
		global $nechka, $shade, $apparition;
		$owner = $this->owner;
		$$owner->register(get_class($this));
	}

//More functions are to be added in the future
}

class reemon extends fightmon
{

	// Allows Reemon-specific functions to be implimented in later versions
	public $owner = 'nechka';

}

class pluff extends fightmon
{

	// Allows Pluff-specific functions to be implimented in later versions
	public $owner = 'shade';

}

class dragiri extends fightmon
{

	// Allows Dragiri-specific functions to be implimented in later versions
	public $owner = 'apparition';

}
