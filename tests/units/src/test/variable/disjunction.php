<?php namespace eastoriented\php\test\tests\units\variable;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\variable as mockOfVariableTest;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class disjunction extends units\test
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
					$test = new mockOfVariableTest,
					$otherTest = new mockOfVariableTest
				),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->never
				->mock($test)
					->receive('recipientOfTestIs')
						->once
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->once

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
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
				->mock($test)
					->receive('recipientOfTestIs')
						->twice
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->twice

			->given(
				$this->calling($otherTest)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(false);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->twice
				->mock($test)
					->receive('recipientOfTestIs')
						->thrice
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->thrice

			->given(
				$this->calling($test)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(true);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
				->mock($test)
					->receive('recipientOfTestIs')
						->{4}
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->thrice
		;
	}

	function testIfTrueExecuteBlock()
	{
		$this
			->given(
				$this->newTestedInstance(
					$test = new mockOfVariableTest,
					$otherTest = new mockOfVariableTest
				),
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($test)
					->receive('blockForTrueTestIs')
						->once
				->mock($otherTest)
					->receive('blockForTrueTestIs')
						->once
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$this->calling($test)->blockForTrueTestIs = function($aBlock) {
					$aBlock->blockArgumentsAre();
				}
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($test)
					->receive('blockForTrueTestIs')
						->twice
				->mock($otherTest)
					->receive('blockForTrueTestIs')
						->once
				->mock($block)
					->receive('blockArgumentsAre')
						->once

			->given(
				$this->calling($test)->blockForTrueTestIs = function($aBlock) {
				},
				$this->calling($otherTest)->blockForTrueTestIs = function($aBlock) {
					$aBlock->blockArgumentsAre();
				}
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($test)
					->receive('blockForTrueTestIs')
						->thrice

				->mock($otherTest)
					->receive('blockForTrueTestIs')
						->twice
				->mock($block)
					->receive('blockArgumentsAre')
						->twice
		;
	}
}
