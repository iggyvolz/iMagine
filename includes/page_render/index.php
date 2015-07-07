<?php

namespace iMagine;

if (!defined("IMAGINE_NO_OUTPUT"))
{
	register_shutdown_function(function()
	{
		global $iMagine;
		if (defined('IMAGINE_HELP'))
		{
			echo json_encode('help');
			return;
		}
		$DIR=__DIR__;
		$response = sprintf(_("Welcome to iMagine %s!"), ((is_dir(__DIR__."/../../.git")&&`git 2>&1|grep "command not found"`===NULL)?(explode("-",`cd "$DIR";git describe --tags|tr -d '\n'`)[0]):(IMAGINE_VERSION)));
		$response.=PHP_EOL;
		$response.=_("For help and credits, type help then press enter.");
		$response = trim($response);
		if (!empty($iMagine->returns))
		{
			foreach ($iMagine->returns as $value)
			{
				$response.=PHP_EOL;
				$response.=$value;
			}
		}
		$globals_dump = $GLOBALS;
		unset($globals_dump['GLOBALS']);
		echo json_encode(array(
			'dump' => ($iMagine->debug || IMAGINE_DEBUG) ? $globals_dump : '',
			'tony_energy' => $iMagine->people["tony"]->energy,
			'edyn_energy' => $iMagine->people["edyn"]->energy,
			'strag_energy' => $iMagine->people["strag"]->energy,
			'response' => $response,
			'errors' => ($iMagine->errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (IMAGINE_DEBUG ? "<p>" . implode("</p><p>", $iMagine->errors) . "</p>" : _("Errors have been hidden by an administrator, but they may have been logged."))
		));
	});
}
