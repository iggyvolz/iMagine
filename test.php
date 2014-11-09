<?php
define("IN_IMAGINE",true);
define("ALPHABET","ABCDEFGHIJKLMNOPQRSTUVWXYZ");
define("IMAGINE_API_URL","http://imagine-php.local/api.php");
define("IMAGINE_ACCESS","TEST");
printf("Checking environment... ");
require "envtest.php";
function req($contents)
{
	return json_decode(file_get_contents(IMAGINE_API_URL, false, stream_context_create(["http"=>["header"=>"Content-type: application/x-www-form-urlencoded\r".PHP_EOL,"method"=>"POST","content"=>http_build_query(["contents"=>$contents])]])));
}
printf("Downloading test suite... ");
$tests=json_decode(file_get_contents("https://raw.githubusercontent.com/iggyvolz/iMagine-Tests/master/tests.json"));
printf("Done.".PHP_EOL);
define("TOTAL_TESTS",count($tests));
$testNum=0;
$failures=0;
foreach($tests as $test)
{
	list($description,$code,$result,$state)=[$test->description,$test->code,$test->result,$test->state];
	$testNum++;
	printf('TEST %d/%d - %s... ', $testNum, TOTAL_TESTS, $description);
	$output=req($code);
	$pass=$output->response==$result;
	printf($pass?"PASS".PHP_EOL:"FAIL".PHP_EOL);
	if(!$pass)
	{
		$failures++;
		printf(">Failed asserting that:".PHP_EOL.">> ");
		printf(str_replace(PHP_EOL,PHP_EOL.">> ",$output->response));
		printf(PHP_EOL.">equals ".PHP_EOL.">> ");
		printf(str_replace(PHP_EOL,PHP_EOL.">> ",$result));
		printf(PHP_EOL);
	}
}
switch($failures):
	case 0:
		printf("There were no failures.  Enjoy iMagine!");
		break;
	case 1:
		trigger_error("There was 1 failure.",E_USER_WARNING);
		break;
	case 2:
		trigger_error("There were $failures failures.",E_USER_WARNING);
		break;
endswitch;
