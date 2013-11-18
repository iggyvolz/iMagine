<?php

class dreamcreature
{

	public function __construct()
	{
		global $dreamplane, $tony, $edyn, $strag;
		$dreamplane->register(get_class($this));
		$owner = $this->owner;
		$$owner->register(get_class($this));
	}

	public function tothedreamplane()
	{
		$args = func_get_args();
		global $dreamplane;
		if ($dreamplane->contains(get_class($this)))
		{
			return array(ucfirst(get_class($this)) . ": I'm already in the Dream Plane!");
		}
		$dreamplane->reregister(get_class($this));
		return array(ucfirst($this->owner) . ": " . ucfirst(get_class($this)) . ', to the Dream Plane!');
	}

}

class furok extends dreamcreature
{

	// Allows Furok-specific functions to be implimented in later versions
	public $owner = 'tony';

}

class ugger extends dreamcreature
{

	// Allows Ugger-specific functions to be implimented in later versions
	public $owner = 'edyn';

}

class freep extends dreamcreature
{

	// Allows Freep-specific functions to be implimented in later versions
	public $owner = 'strag';

}
