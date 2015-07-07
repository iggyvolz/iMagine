<?php

namespace iMagine;

if (!defined("IMAGINE_NO_OUTPUT"))
{
	if (IMAGINE_MODE === 'normal')
	{
		register_shutdown_function(function()
		{
			if (defined('IMAGINE_REFRESH'))
			{
				echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
				die;
			}
			global $iMagine;
			$page = file_get_contents(__DIR__ . '/page.html');
			$DIR=__DIR__;
			$response = sprintf(_("Welcome to iMagine %s!"), ((is_dir(__DIR__."/../../.git")&&`git 2>&1|grep "command not found"`===NULL)?(explode("-",`cd "$DIR";git describe --tags|tr -d '\n'`)[0]):(IMAGINE_VERSION)));
			$response.=PHP_EOL;
			$response.=_("For help and credits, type help then press enter.");
			$response = $response;
			if (!empty($iMagine->returns))
			{
				foreach ($iMagine->returns as $value)
				{
					$response.=PHP_EOL;
					$response.=$value;
				}
			}
			$replacements = array(
				'<!-- RESPONSE -->' => $response,
				'<!-- ENERGY_TONY -->' => $iMagine->people["tony"]->energy,
				'<!-- ENERGY_EDYN -->' => $iMagine->people["edyn"]->energy,
				'<!-- ENERGY_STRAG -->' => $iMagine->people["strag"]->energy,
				'<!-- STARTING_ENERGY_TONY -->' => IMAGINE_TONY_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_EDYN -->' => IMAGINE_EDYN_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_STRAG -->' => IMAGINE_STRAG_STARTING_ENERGY,
				'<!-- NAME_TONY -->' => _("Tony"),
				'<!-- NAME_EDYN -->' => _("Edyn"),
				'<!-- NAME_STRAG -->' => _("Strag"),
			);
			$page = str_replace(array_keys($replacements), array_values($replacements), $page);
			$page = utf8_decode($page); // Change ASCII code to actual letter
			echo $page;
		});
	}

	if (IMAGINE_MODE === 'api')
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
				'cutscene' => defined('IMAGINE_SHOW_CUTSCENE'),
				'tony_energy' => $iMagine->people["tony"]->energy,
				'edyn_energy' => $iMagine->people["edyn"]->energy,
				'strag_energy' => $iMagine->people["strag"]->energy,
				'response' => $response,
				'errors' => ($iMagine->errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (IMAGINE_DEBUG ? "<p>" . implode("</p><p>", $iMagine->errors) . "</p>" : _("Errors have been hidden by an administrator, but they may have been logged."))
			));
		});
	}
}
