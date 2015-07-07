<?php

namespace iMagine;

if (function_exists("textdomain")) // Run only if gettext is enabled
{
	putenv('LC_ALL=' . IMAGINE_LANG);
	setlocale(LC_ALL, IMAGINE_LANG);

	bindtextdomain("iMagine_" . IMAGINE_VERSION, __DIR__."/translation-files");

	textdomain("iMagine_" . IMAGINE_VERSION);


	bind_textdomain_codeset("iMagine_" . IMAGINE_VERSION, 'UTF-8'); // Use UTF-8
}
if (!function_exists("iMagine\_"))
{

	function _($return)
	{
		return $return;
	}

}
