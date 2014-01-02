<?php

if (!defined('FTGR_WINDOWS'))
{
	define('FTGR_WINDOWS', FALSE); // Change this to TRUE if you use Windows.
	define('FTGR_SLASH', FTGR_WINDOWS ? '\/' : '/');
}
require_once __DIR__ . FTGR_SLASH . 'includes' . FTGR_SLASH . 'constants' . FTGR_SLASH . 'index.php';
if (is_file(__DIR__ . FTGR_SLASH . 'includes' . FTGR_SLASH . 'help' . FTGR_SLASH . FTGR_LANG . '.php'))
{
	require_once __DIR__ . FTGR_SLASH . 'includes' . FTGR_SLASH . 'help' . FTGR_SLASH . FTGR_LANG . '.php';
}
else
{
	echo str_replace(array('%1'), array(FTGR_LANG), _('No documentation avaliable for language %1.'));
}