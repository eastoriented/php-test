<?php namespace eastoriented\php\test\tests\units\recipient\container;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\recipient')
		;
	}

	function testBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$recipient = new mockOfRecipient,
					$otherRecipient = new mockOfRecipient
				)
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $otherRecipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
				->mock($otherRecipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $otherRecipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
				->mock($otherRecipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
		;
	}
}
