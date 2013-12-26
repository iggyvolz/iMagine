<?php

$avaliable_battles[] = 'example';
_('example');

class example extends battle
{

	public function __construct()
	{
		$_SESSION['ftgr']['battle'] = get_class();
		array_push($this->opponents, new feniixis, new feniixis, new feniixis);
		$this->_construct();
	}

}
