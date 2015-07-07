<?php

namespace iMagine;

require_once 'includes/constants/index.php';
if (is_file('/includes/help/' . IMAGINE_LANG . '.php'))
{
	require_once 'includes/help/' . IMAGINE_LANG . '.php';
}
else
{
	printf(_("No documentation available for language %s."),IMAGINE_LANG);
}