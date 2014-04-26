<?php

namespace ftgr_functions;

trait changeto
{
	public function changeto($args = NULL)
	{
		$_SESSION['ftgr']['me'] = explode('\\', get_class($this))[1];
		$GLOBALS['me'] = explode('\\', get_class($this))[1];
		return array(sprintf(\ftgr\_('%s is now selected!'), ucfirst(explode('\\', get_class($this))[1])));
	}
}