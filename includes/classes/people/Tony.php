<?php

namespace iMagine;

class Tony extends Person
{
	public function __construct()
	{
		$this->energy=IMAGINE_TONY_STARTING_ENERGY;
		$this->dreamcreatures=[new Furok()];
	}
}
