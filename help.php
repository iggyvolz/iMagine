<?php

namespace iMagine;

require_once realpath(__DIR__ . '/includes/constants/index.php');
if (is_file(realpath(__DIR__ . '/includes/help/' . IMAGINE_LANG . '.php')))
{
	require_once realpath(__DIR__ . '/includes/help/' . IMAGINE_LANG . '.php');
}
else
{
	printf(_("No documentation available for language %s."),IMAGINE_LANG);
}