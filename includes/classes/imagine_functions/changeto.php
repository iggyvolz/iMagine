<?php

namespace iMagine_functions;

trait changeto
{
	public function changeto($args = NULL)
	{
		$_SESSION['iMagine']['me'] = explode('\\', get_class($this))[1];
		$GLOBALS['me'] = explode('\\', get_class($this))[1];
		return array(sprintf(\iMagine\_('%s is now selected!'), ucfirst(explode('\\', get_class($this))[1])));
	}
}