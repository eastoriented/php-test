<?php namespace eastoriented\php\test\tests\units;

require __DIR__ . '/../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class isGreaterThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs()
	{
		$this
			->given(
				$this->newTestedInstance($reference = PHP_INT_MAX),
				$variable = rand(PHP_INT_MIN, PHP_INT_MAX - 1),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->given(
				$this->newTestedInstance($reference = PHP_INT_MIN),
				$variable = rand(PHP_INT_MIN + 1, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
