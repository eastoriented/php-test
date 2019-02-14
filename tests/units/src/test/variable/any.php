<?php namespace eastoriented\php\test\tests\units\variable;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\variable')
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance($variable = uniqid(), $test = new mockOfTest),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($variable, $test))
				->mock($test)
					->receive('recipientOfTestOnVariableIs')
						->withArguments($variable, $recipient)
							->once
		;
	}
}
