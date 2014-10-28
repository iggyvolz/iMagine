<?php

class APITest extends PHPUnit_Framework_TestCase
{

	public function testChangeto()
	{
		global $blazer, $me;
		$test = new PHPUnitTest($this, "Testing changeto()", __METHOD__, 2);
		$output = $blazer->changeto([]);
		$test->assertEquals($me, 'blazer');
		$test->assertEquals($output, ["Blazer is now selected!"]);
	}

	public function testCutscene()
	{
		global $blazer;
		$test = new PHPUnitTest($this, "Testing cutscene()", __METHOD__, 2);
		$output = $blazer->cutscene(['foo']);
		$test->assertEquals($output, ['Calling cutscene "foo"']);
		$output = $blazer->cutscene(['"bar"']);
		$test->assertEquals($output, ['Calling cutscene "&quot;bar&quot;"']);
	}

	public function testDebug()
	{
		global $blazer;
		$test = new PHPUnitTest($this, "Testing debug()", __METHOD__, 10);
		if (!IMAGINE_DEBUG)
		{
			$test->skipTest("Please turn on debug mode to accurately test this function.");
			return;
		}
		$output = $blazer->debug(['on']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['ftgr']['debug']);
		$output = $blazer->debug(['']);
		$test->assertEquals($output, ['Debug mode is now off.']);
		$test->assertFalse($_SESSION['ftgr']['debug']);
		$output = $blazer->debug(['']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['ftgr']['debug']);
		$output = $blazer->debug(['on']);
		$test->assertEquals($output, ['Debug mode is now on.']);
		$test->assertTrue($_SESSION['ftgr']['debug']);
		$output = $blazer->debug(['']);
		$test->assertEquals($output, ['Debug mode is now off.']);
		$test->assertFalse($_SESSION['ftgr']['debug']);
	}

	public function testHelp()
	{
		global $blazer;
		$test = new PHPUnitTest($this, "Testing help()", __METHOD__, 2);
		$output = $blazer->help();
		$test->assertTrue(defined('IMAGINE_HELP'));
		$test->assertEquals($output, ['Opened help.']);
	}

	public function testReset()
	{
		global $blazer, $initial_session;
		$test = new PHPUnitTest($this, "Testing reset()", __METHOD__, 3);
		$output = $blazer->reset();
		$test->assertEquals($_SESSION['ftgr'], $initial_session);
		$test->assertEquals([''], $output);
		$test->assertTrue(defined('IMAGINE_REFRESH'));
	}

	public function testVersion()
	{
		global $blazer;
		$test = new PHPUnitTest($this, "Testing version()", __METHOD__, 3);
		$test->skipTest("Version function disabled.");
		/* $output = $blazer->version();
		  $test->assertEquals($output, ['Current version is ' . IMAGINE_VERSION . '.']); */
	}

}
