<?php
require __DIR__."/config.php";
define("IN_IMAGINE",true);
define("ALPHABET","ABCDEFGHIJKLMNOPQRSTUVWXYZ");
define("IMAGINE_ACCESS","TEST");
if(!defined("IMAGINE_MODE"))
{
	define("IMAGINE_MODE","test");
	if(!isset($_GET["pre"])&&!isset($argv))
	{
		echo "<pre>";
		register_shutdown_function(function(){echo "</pre>";});
	}
}
if(!defined("IMAGINE_API_URL"))
{
	define("IMAGINE_API_URL",$argv[1]);
}
printf("Checking environment... ");
require "envtest.php";
function req($contents)
{
	return json_decode(file_get_contents(IMAGINE_API_URL, false, stream_context_create(["http"=>["header"=>"Content-type: application/x-www-form-urlencoded\r".PHP_EOL,"method"=>"POST","content"=>http_build_query(["contents"=>$contents])]])));
}
printf("Downloading test suite... ");
$tests=json_decode(file_get_contents("https://raw.githubusercontent.com/iggyvolz/iMagine-Tests/master/tests.json"));
printf("Done.".PHP_EOL);
define("TOTAL_TESTS",count((array)$tests));
$testNum=0;
$failures=0;
foreach($tests as $test)
{
	list($description,$code,$result,$state)=[$test->description,$test->code,$test->result,$test->state];
	$DIR=__DIR__;
	$replacements=["_v_"=>explode("-",`cd $DIR;git describe --tags|tr -d '\n'`)[0],"_c_"=>`cd $DIR;git log -1 --pretty=%H|tr -d '\n'`,"_m_"=>`cd $DIR;git log -1 --pretty=%B|tr -d '\n'`,"_nc_"=>((strpos(`cd $DIR;git describe --tags|tr -d '\n'`,"-")!==FALSE)?(explode("-",`cd $DIR;git describe --tags|tr -d '\n'`)[1]):NULL)];
	$testNum++;
	printf('TEST %d/%d - %s... ', $testNum, TOTAL_TESTS, $description);
	$pass=false;
	foreach((array)$result as $xresult)
	{
		$xresult=str_replace(array_keys($replacements),array_values($replacements),$xresult);
		$output=req($code);
		$pass=(($output->response==$xresult)||$pass);
	}
	printf($pass?"PASS".PHP_EOL:"FAIL".PHP_EOL);
	if(!$pass)
	{
		$failures++;
		printf(">Failed asserting that:".PHP_EOL.">> ");
		printf(str_replace(PHP_EOL,PHP_EOL.">> ",$output->response));
		printf(PHP_EOL.(count((array)$result)>1?">matches any of:":"equals:").PHP_EOL.">> ");
		$i=0;
		foreach((array)$result as $xresult)
		{
			$xresult=str_replace(array_keys($replacements),array_values($replacements),$xresult);
			$i++;
			printf(str_replace(PHP_EOL,PHP_EOL.">> ",$xresult));
			if(count((array)$result)!==$i)
			{
				printf(PHP_EOL.">or:".PHP_EOL.">> ");
			}
		}
		printf(PHP_EOL);
	}
}
switch($failures):
	case 0:
		printf("There were no failures.  Enjoy iMagine!\n");
		break;
	case 1:
		trigger_error("There was 1 failure.",E_USER_ERROR);
		break;
	default:
		trigger_error("There were $failures failures.",E_USER_ERROR);
		break;
endswitch;