<?php

namespace iMagine_functions;

trait reset
{
	public function reset($args = NULL)
	{
		global $iMagine;
		unset($_SESSION['iMagine']);
		$iMagine=new iMagine();
		define('IMAGINE_REFRESH', TRUE);
		return array('');
	}
}
