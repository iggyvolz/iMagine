<?php

namespace ftgr;

if (function_exists("textdomain")) // Run only if gettext is enabled
{
	putenv('LC_ALL=' . FTGR_LANG);
	setlocale(LC_ALL, FTGR_LANG);

	bindtextdomain("ftgr", __DIR__);

	textdomain("ftgr");


	bind_textdomain_codeset('ftgr', 'UTF-8'); // Use UTF-8
}
else
{

	// Define default return values for gettext functions
	function _($return)
	{
		return $return;
	}

}