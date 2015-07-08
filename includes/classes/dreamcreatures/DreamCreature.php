<?php

namespace iMagine;

class DreamCreature
{
	use \dream_creature_functions\tothedreamplane;
	public $moves=[];
	public $indreamplane=true;
	public $owner;
	public function __construct($owner)
	{
		$this->owner=$owner;
	}
}
