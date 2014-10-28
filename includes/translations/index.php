<?php

namespace iMagine;

if (function_exists("textdomain")) // Run only if gettext is enabled
{
	putenv('LC_ALL=' . IMAGINE_LANG);
	setlocale(LC_ALL, IMAGINE_LANG);

	bindtextdomain("ftgr_" . IMAGINE_VERSION, __DIR__);

	textdomain("ftgr_" . IMAGINE_VERSION);


	bind_textdomain_codeset("ftgr_" . IMAGINE_VERSION, 'UTF-8'); // Use UTF-8
}
if (!function_exists("ftgr\_"))
{

	function _($return)
	{
		return $return;
	}

}