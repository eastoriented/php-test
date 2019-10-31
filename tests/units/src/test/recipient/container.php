<?php namespace eastoriented\php\test\tests\units\recipient;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class container extends units\test
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
					$iterator = new mockOfIterator,
					$recipient = new mockOfRecipient,
					$otherRecipient = new mockOfRecipient
				)
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $recipient, $otherRecipient))
				->mock($recipient)
					->receive('booleanIs')
						->never
				->mock($otherRecipient)
					->receive('booleanIs')
						->never

			->given(
				$this->calling($iterator)->variablesForIteratorBlockAre = function($anIteratorBlock, $aRecipient, $anOtherRecipient) use ($iterator) {
					$anIteratorBlock->containerIteratorHasValue($iterator, $aRecipient);
					$anIteratorBlock->containerIteratorHasValue($iterator, $anOtherRecipient);
				}
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $recipient, $otherRecipient))
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
					->isEqualTo($this->newTestedInstance($iterator, $recipient, $otherRecipient))
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
