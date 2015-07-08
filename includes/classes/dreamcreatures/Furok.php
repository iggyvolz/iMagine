<?php

namespace iMagine;

class Furok extends DreamCreature
{
	public function __construct(...$args)
	{
		parent::__construct(...$args);
		$this->catchphrase=\iMagine\_("Let the fur fly!");
	}
}
