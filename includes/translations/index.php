<?php

namespace iMagine;

if (function_exists("textdomain")) // Run only if gettext is enabled
{
	putenv('LC_ALL=' . FTGR_LANG);
	setlocale(LC_ALL, FTGR_LANG);

	bindtextdomain("ftgr_" . FTGR_VERSION, __DIR__);

	textdomain("ftgr_" . FTGR_VERSION);


	bind_textdomain_codeset("ftgr_" . FTGR_VERSION, 'UTF-8'); // Use UTF-8
}
if (!function_exists("ftgr\_"))
{

	function _($return)
	{
		return $return;
	}

}