<?php

namespace ftgr;

require_once realpath(__DIR__ . '/includes/constants/index.php');
if (is_file(realpath(__DIR__ . '/includes/help/' . FTGR_LANG . '.php')))
{
	require_once realpath(__DIR__ . '/includes/help/' . FTGR_LANG . '.php');
}
else
{
	printf(_("No documentation available for language %s."),FTGR_LANG);
}