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

	public static $totalTests = 0;
	public static $testNum = 0;

	public static function setup()
	{
		foreach (scandir(__DIR__) as $file)
		{
			$class = explode('.', $file)[0];
			if (!class_exists($class))
			{
				continue;
			}
			foreach (get_class_methods($class) as $test)
			{
				if (strpos($test, 'test') === 0)
				{
					self::$totalTests++;
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
	public $parts;
	public $thisPart = 0;

	public function __construct($object, $description, $method, $parts = 1)
	{
		$this->object = $object;
		$this->method = $method;
		$this->description = $description;
		$this->parts = $parts;
		testHandler::$testNum++;
		printf('[TEST] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
		echo PHP_EOL;
	}

	public function assertEquals($first, $second)
	{
		$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		list($object, $method, $description, $parts) = [$this->object, $this->method, $this->description, $this->parts];
		if ($first === $second)
		{
			if ($parts === 1)
			{
				printf('--[PASS] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[PASS] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
				$this->thisPart++;
			}
			echo PHP_EOL;
		}
		else
		{
			if ($parts === 1)
			{
				printf('--[FAIL] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[FAIL] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
				$this->thisPart++;
			}
			echo PHP_EOL;
		}
		$object->assertEquals($first, $second);
	}

	public function assertTrue($first)
	{
		$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		list($object, $method, $description, $parts) = [$this->object, $this->method, $this->description, $this->parts];
		if ($first)
		{
			if ($parts === 1)
			{
				printf('--[PASS] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[PASS] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
			}
			echo PHP_EOL;
		}
		else
		{
			if ($parts === 1)
			{
				printf('--[FAIL] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[FAIL] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
			}
			echo PHP_EOL;
		}
		$object->assertTrue($first);
	}

	public function assertFalse($first)
	{
		$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		list($object, $method, $description, $parts) = [$this->object, $this->method, $this->description, $this->parts];
		if (!$first)
		{
			if ($parts === 1)
			{
				printf('--[PASS] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[PASS] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
			}
			echo PHP_EOL;
		}
		else
		{
			if ($parts === 1)
			{
				printf('--[FAIL] %d/%d %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description);
			}
			else
			{
				printf('--[FAIL] %d%s/%d %s - %s', testHandler::$testNum, $alphabet[$this->thisPart], testHandler::$totalTests, $method, $description);
			}
			echo PHP_EOL;
		}
		$object->assertFalse($first);
	}

	public function skipTest($reason)
	{
		list($object, $method, $description, $parts) = [$this->object, $this->method, $this->description, $this->parts];
		printf('--[SKIP] %d/%d %s - %s - %s', testHandler::$testNum, testHandler::$totalTests, $method, $description, $reason);
		echo PHP_EOL;
	}

}
