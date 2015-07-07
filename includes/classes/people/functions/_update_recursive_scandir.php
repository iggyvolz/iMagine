<?php

namespace people_functions;

trait _update_recursive_scandir
{
	public function _update_recursive_scandir($dir)
	{
		$result = array();
		$root = scandir($dir);
		foreach ($root as $value)
		{
			if ($value === '.' || $value === '..')
			{
				continue;
			}
			if (is_file(realpath("$dir/$value")))
			{
				$result[] = realpath($dir / $value);
				continue;
			}
			foreach ($this->update_recursive_scandir(realpath("$dir/$value")) as $value)
			{
				$result[] = $value;
			}
		}
		return $result;
	}
}