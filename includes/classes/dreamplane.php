<?php

class dreamplane
{

	private $contents = array();
	private $evercontents = array();

	public function __construct()
	{
		$this->contents = isset($_SESSION['iMagine']['dreamplane']) ? $_SESSION['iMagine']['dreamplane'] : array();
	}

	public function __destruct()
	{
		unset($_SESSION['iMagine']['dreamplane']);
		$_SESSION['iMagine']['dreamplane'] = $this->contents;
	}

	public function contents()
	{
		return $this->contents();
	}

	public function contains($creature)
	{
		return in_array($creature, $this->contents);
	}

	public function deregister($creature)
	{
		unset($this->contents[array_search($creature, $this->contents)]);
	}

	public function evercontents()
	{
		return $this->evercontents;
	}

	public function evercontains($creature)
	{
		return in_array($creature, $this->evercontents);
	}

	public function register($creature)
	{
		if (!isset($_SESSION['iMagine']['dreamplane']))
		{
			$this->contents[] = $creature;
		}
		$this->evercontents[] = $creature;
	}

	public function reregister($creature)
	{
		$this->contents[] = $creature;
	}

}
