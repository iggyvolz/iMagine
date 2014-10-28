<?php

namespace iMagine;

class Tony extends Person
{

// Allows Tony-specific methods to be implimented in later versions
	public $energy = IMAGINE_TONY_STARTING_ENERGY;
	public $moves = array();
}
