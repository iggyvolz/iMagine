<?php

namespace dream_creature_functions;

trait tothedreamplane
{
	public function tothedreamplane(...$excess)
	{
		global $iMagine;
		$iMagine->people[$person]->energy-=100;
		return [sprintf(\iMagine\_("%s: %s, to the dream plane!"),\iMagine\_(ucfirst(get_parent_class())),\iMagine\_(ucfirst(get_class())))];
	}
}
