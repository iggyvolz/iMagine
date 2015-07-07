<?php

namespace people_functions;

trait _update_remove_folder
{
	public function _update_remove_folder($dir)
	{
		$files = array_diff(scandir($dir), array('.', '..'));
		foreach ($files as $file)
		{
			(is_dir(realpath("$dir/$file"))) ? $this->update_remove_folder(realpath("$dir/$file")) : unlink(realpath("$dir/$file"));
		}
		return rmdir($dir);
	}
}