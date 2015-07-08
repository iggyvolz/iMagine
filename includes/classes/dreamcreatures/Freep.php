<?php

namespace iMagine;

class Freep extends DreamCreature
{
	public function __construct(...$args)
	{
		parent::__construct(...$args);
		$this->catchphrase=\iMagine\_("Whose noggin needs knockin?");
	}
}
