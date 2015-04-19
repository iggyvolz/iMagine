<?php

namespace iMagine;

if (!defined('IMAGINE_MODE'))
{
	define('IMAGINE_MODE', 'normal');
}
define('IMAGINE_VERSION', "development");
define('IMAGINE_LANG', 'en_US'); // en_US - English (US), fr_FR - French (France), es_ES - Spanish (Spain) [In progress]
define('IMAGINE_DEBUG', FALSE); // If TRUE, allow the debug command to run
define('IMAGINE_ALLOW_ANY_UPDATE', FALSE); // Allow anyone to run the update command.
define('IMAGINE_UPDATE_CODE', 'abc123'); // Put the update code in place of NULL to validate your session for update.
define("IMAGINE_TONY_STARTING_ENERGY", 1000);
define("IMAGINE_EDYN_STARTING_ENERGY", 1000);
define("IMAGINE_STRAG_STARTING_ENERGY", 1000);
