<?php

class APITest extends PHPUnit_Framework_TestCase
{

	public function testChangeto()
	{
		global $tony, $me;
		$test = new PHPUnitTest($this, "Testing changeto()", __METHOD__, 2);
		$output = $tony->changeto([]);
		$test->assertEquals($me, 'Tony');
		$test->assertEquals($output, ["Tony is now selected!"]);
	}

	public function testCutscene()
	{
		global $tony;
		$test = new PHPUnitTest($this, "Testing cutscene()", __METHOD__, 2);
		$output = $tony->cutscene(['foo']);
		$test->assertEquals($output, ['Calling cutscene "foo"']);
		$output = $tony->cutscene(['"bar"']);
		$test->assertEquals($output, ['Calling cutscene "&quot;bar&quot;"']);
	}

	public function testDebug()
	{
		global $tony;
		$test = new PHPUnitTest($this, "Testing debug()", __METHOD__, 10);
		if (!IMAGINE_DEBUG)
		{
			$test->skipTest("Please turn on debug mode to accurately test this function.");
			return;
		}
		$output = $tony->debug(['on']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['iMagine']['debug']);
		$output = $tony->debug(['']);
		$test->assertEquals($output, ['Debug mode is now off.']);
		$test->assertFalse($_SESSION['iMagine']['debug']);
		$output = $tony->debug(['']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['iMagine']['debug']);
		$output = $tony->debug(['on']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['iMagine']['debug']);
		$output = $tony->debug(['']);
		$test->assertEquals($output, ['Debug mode is now off.']);
		$test->assertFalse($_SESSION['iMagine']['debug']);
	}

	public function testHelp()
	{
		global $tony;
		$test = new PHPUnitTest($this, "Testing help()", __METHOD__, 2);
		$output = $tony->help();
		$test->assertTrue(defined('IMAGINE_HELP'));
		$test->assertEquals($output, ['Opened help.']);
	}

	public function testReset()
	{
		global $tony, $initial_session;
		$test = new PHPUnitTest($this, "Testing reset()", __METHOD__, 3);
		$output = $tony->reset();
		$test->assertEquals($_SESSION['iMagine'], $initial_session);
		$test->assertEquals([''], $output);
		$test->assertTrue(defined('IMAGINE_REFRESH'));
	}

	public function testVersion()
	{
		global $tony;
		$test = new PHPUnitTest($this, "Testing version()", __METHOD__, 3);
		$test->skipTest("Version function disabled.");
		/* $output = $tony->version();
		  $test->assertEquals($output, ['Current version is ' . IMAGINE_VERSION . '.']); */
	}

}
