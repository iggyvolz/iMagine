<?php

class IndexTest extends PHPUnit_Framework_TestCase
{

	public $testNum = 0;
	public $totalTests = 0;
	private $description = "";
	private $method = "";
	private $testsFailed = 0;

	public function __construct()
	{
		echo PHP_EOL;
		foreach (get_class_methods($this) as $test)
		{
			if (strpos($test, 'test') === 0)
			{
				$this->totalTests++;
			}
		}
	}

	public function __destruct()
	{
		if ($this->testsFailed > 0)
		{
			echo strval($this->testsFailed) . " tests have failed."; // In future email test results to us
		}
	}

	public function describeTest($method, $description)
	{
		$this->testNum++;
		if ($this->totalTests === 0)
		{
			$this->__construct();
		}
		printf('[TEST] %d/%d %s - %s', $this->testNum, $this->totalTests, $method, $description);
		echo PHP_EOL;
		list($this->method, $this->description) = [$method, $description];
	}

	public function doAssertEquals($first, $second)
	{
		list($method, $description) = [$this->method, $this->description];
		if ($first === $second)
		{
			printf('[PASS] %d/%d %s - %s', $this->testNum, $this->totalTests, $method, $description);
			echo PHP_EOL;
		}
		else
		{
			$this->testsFailed++;
			printf('[FAIL] %d/%d %s - %s', $this->testNum, $this->totalTests, $method, $description);
			echo PHP_EOL;
		}
		if ($this->totalTests == $this->testNum)
		{
			$this->__destruct();
		}
	}

	public function testPHPVersion()
	{
		$testNum = $this->describeTest(__METHOD__, 'Testing PHP version to see if at least PHP 5.4');
		$this->doAssertEquals(version_compare(PHP_VERSION, "5.4", ">="), true);
		$this->assertEquals(version_compare(PHP_VERSION, "5.4", ">="), true);
	}

}
