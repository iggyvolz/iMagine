<?php

namespace iMagine_functions;

trait update
{
	public function update($args = NULL)
	{
		global $iMagine;
		return array(\iMagine\_("WARNING - The Update function has been removed until further notice due to the iMagine move."));
		if (!$iMagine->valid_session)
		{
			return array(\iMagine\_('You cannot update.  Please enter the update code with auth_code()'));
		}
		if ($args === 'NULL')
		{
			return array(\iMagine\_('This function requires a parameter.  Please see the documentation.'));
		}
		$url = trim('http://fightmon.eternityincurakai.com/ftgr/' . $args[0] . '.zip');
		$err = isset($php_errormsg) ? $php_errormsg : NULL;
		$contents = @file_get_contents($url);
		$latesterr = isset($php_errormsg) ? $php_errormsg : NULL;
		if ($err !== $latesterr)
		{
			return array(\iMagine\_('Either you are not connected to wi-fi, the Fightmon site is down, or you specified an incorrect version.'));
		}
		file_put_contents(realpath(__DIR__ . '/ftgr.zip'), $contents);
		$zip = new ZipArchive;
		$res = $zip->open(__DIR__ . realpath('/ftgr.zip'));
		if ($res === TRUE)
		{
			$zip->extractTo(__DIR__ . realpath('/ftgr'));
			$zip->close();
		}
		else
		{
			return array(IMAGINE_UNZIP_FAIL . $res);
		}
		$folder = realpath(__DIR__ . '/ftgr/') . scandir(realpath(__DIR__ . '/ftgr'))[2];
		$scan = $this->update_recursive_scandir($folder);
		$return = array();
		foreach ($scan as $value)
		{
			$worked = copy($value, str_replace(realpath(__DIR__ . '/includes/classes/ftgr/Fightmon-the-Game--Reemon-dev/'), realpath(__DIR__ . '/' . $value)));
		}
		unlink(realpath(__DIR__ . '/ftgr.zip'));
		$this->update_remove_folder(realpath(__DIR__ . '/ftgr'));
		return array(sprintf(\iMagine\_("Successfully upgraded to version %s."), str_replace('-', '.', $args[0])));
	}
}
