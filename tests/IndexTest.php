<?php

class IndexTest extends PHPUnit_Framework_TestCase
{

	public function testPHPVersion()
	{
		$test = new PHPUnitTest($this, "Testing PHP version to see if at least PHP 5.4", __METHOD__);
		$test->assertEquals(version_compare(PHP_VERSION, "5.4", ">="), true);
	}

}
