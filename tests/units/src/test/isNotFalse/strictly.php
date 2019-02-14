<?php namespace eastoriented\php\test\tests\units\isNotFalse;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class strictly extends units\test
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
				$this->newTestedInstance,
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(true, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(false, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
