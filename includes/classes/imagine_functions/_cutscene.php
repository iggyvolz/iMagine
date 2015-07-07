<?php

namespace iMagine_functions;

trait _cutscene
{
	public function _cutscene($cutscene,...$overflow)
	{
		global $iMagine;
		$iMagine->cutscene=$custcene;
		@define('IMAGINE_SHOW_CUTSCENE', TRUE);
	}
}
