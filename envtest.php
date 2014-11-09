<?php
define("REQUIRED_VERSION","5.4");
if(!defined("IMAGINE_ACCESS"))
{
	define("IMAGINE_ACCESS","RAW");
}
switch ([IMAGINE_ACCESS,version_compare(PHP_VERSION, REQUIRED_VERSION, ">=")])
{
	case ["RAW",true]:
		printf("Your environment is clean and ready to use with iMagine!");
		break;
	case ["RAW",false]:
		printf("ERROR - your version of %s is less than the required version of %s.  You may experience problems.",PHP_VERSION,REQUIRED_VERSION);
		break;
	case ["GAME",true]:
		break;
	case ["GAME",false]:
		printf("ERROR - your version of %s is less than the required version of %s.  You may experience problems.",PHP_VERSION,REQUIRED_VERSION);
		die;
		break;
	case ["TEST",true]:
		printf("OK\n");
		break;
	case ["TEST",false]:
		printf("FAIL\nERROR - your version of %s is less than the required version of %s.  You may experience problems.",PHP_VERSION,REQUIRED_VERSION);
		break;
}
