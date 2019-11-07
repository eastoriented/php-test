<?php namespace eastoriented\php\test\tests\units\variable\container;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\php\container\iterator;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class breakOnTrue extends units\test
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
				$this->newTestedInstance(
					$iterator = new mockOfIterator,
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$recipient = new mockOfTest\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($test)
					->receive('recipientOfTestIs')
						->never
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->never

			->given(
				$this->newTestedInstance(
					$iterator = new iterator\fifo,
					$test,
					$otherTest
				),

				$this->calling($test)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(true);
				},

				$this->calling($otherTest)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(true);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($test)
					->receive('recipientOfTestIs')
						->once
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->never

			->given(
				$this->calling($test)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(false);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($test)
					->receive('recipientOfTestIs')
						->twice
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->once
		;
	}
}
