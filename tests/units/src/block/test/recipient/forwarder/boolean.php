<?php namespace eastoriented\php\block\tests\units\test\recipient\forwarder;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class boolean extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\block')
		;
	}

	function testBlockARgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance($recipient = new mockOfRecipient, $boolean = (bool) rand(0, 1))
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $boolean))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments($boolean)
							->once
		;
	}
}
