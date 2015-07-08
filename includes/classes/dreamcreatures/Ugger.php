<?php

namespace iMagine;

class Ugger extends DreamCreature
{
	public function __construct(...$args)
	{
		parent::__construct(...$args);
		$this->catchphrase=\iMagine\_("Here I am!");
	}
}
