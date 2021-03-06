<?php

namespace people_functions;

trait update
{
	public function update(...$excess)
	{
		return array(\iMagine\_("The update functions have been removed temporarily due to changes in iMagine's structure."));
			global $iMagine;
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
		file_put_contents('/ftgr.zip', $contents);
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
		$folder = '/ftgr/' . scandir('/ftgr')[2];
		$scan = $this->update_recursive_scandir($folder);
		$return = array();
		foreach ($scan as $value)
		{
			$worked = copy($value, str_replace('/includes/classes/ftgr/Fightmon-the-Game--Reemon-dev/', '/' . $value));
		}
		unlink('/ftgr.zip');
		$this->update_remove_folder('/ftgr');
		return array(sprintf(\iMagine\_("Successfully upgraded to version %s."), str_replace('-', '.', $args[0])));
	}
}
