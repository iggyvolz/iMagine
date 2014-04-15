<?php

/*
 * Do NOT rename - this file must be included last so that we can access other classes
 */
ob_start();
define("FTGR_NO_OUTPUT", true);
require_once realpath(dirname(__DIR__) . '/src/index.php');
ob_end_clean();

class testHandler
{

	public static $totalTests = 1;
	public static $testNum = 0;
	public static $firstTest = true;

	public static function setup()
	{
		foreach (scandir(__DIR__) as $class)
		{
			if (!class_exists($class))
			{
				continue;
			}
			foreach (get_class_methods($class) as $test)
			{
				if (strpos($test, 'test') === 0)
				{
					$this->totalTests++;
				}
			}
		}
	}

}

testHandler::setup();

class PHPUnitTest
{

	public $method;
	public $description;
	public $object;

	public function __construct($object, $description, $method)
	{
		if (testHandler::$firstTest)
		{
			echo PHP_EOL . PHP_EOL . PHP_EOL; // Go a few lines down before first test
			testHandler::$firstTest = false;
		}
		$this->object = $object;
		$this->method = $method;
		$this->description = $description;
		testHandler::$testNum++;
		printf('[TEST] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
		echo PHP_EOL;
	}

	public function assertEquals($first, $second)
	{
		list($method, $description) = [$this->method, $this->description];
		if ($first === $second)
		{
			printf('[PASS] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			echo PHP_EOL;
		}
		else
		{
			printf('[FAIL] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			echo PHP_EOL;
		}
		$this->object->assertEquals($first, $second);
	}

}
