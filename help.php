<?php

namespace ftgr;

require_once realpath(__DIR__ . '/includes/constants/index.php');
if (is_file(realpath(__DIR__ . '/includes/help/' . FTGR_LANG . '.php')))
{
	require_once realpath(__DIR__ . '/includes/help/' . FTGR_LANG . '.php');
}
else
{
	echo str_replace(array('%1'), array(FTGR_LANG), _('No documentation avaliable for language %1.'));
}