<?php

class IndexTest extends PHPUnit_Framework_TestCase
{

	public $testNum = 0;
	public $totalTests = 0;
	private $description = "";
	private $method = "";

	public function describeTest($method, $description)
	{
		$this->testNum++;
		if ($this->totalTests === 0)
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
			printf('[FAIL] %d/%d %s - %s', $this->testNum, $this->totalTests, $method, $description);
			echo PHP_EOL;
		}
	}

	public function testPHPVersion()
	{
		$testNum = $this->describeTest(__METHOD__, 'Testing PHP version to see if at least PHP 5.4');
		$this->doAssertEquals(version_compare(PHP_VERSION, "5.4", ">="), true);
		$this->assertEquals(version_compare(PHP_VERSION, "5.4", ">="), true);
	}

}
