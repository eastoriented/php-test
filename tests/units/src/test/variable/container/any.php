<?php namespace eastoriented\php\test\tests\units\variable\container;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\variable\container')
		;
	}

	function testIteratorBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$iterator = new mockOfIterator,
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$block = new mockOfIterator\block
			)
			->if(
				$this->testedInstance->iteratorBlockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, $test, $otherTest)
							->once
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
				$this->calling($iterator)->variablesForIteratorBlockAre = function($anIteratorBlock, $aTest, $anOtherTest) use ($iterator) {
					$anIteratorBlock->containerIteratorHasValue($iterator, $aTest);
					$anIteratorBlock->containerIteratorHasValue($iterator, $anOtherTest);
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
						->withArguments($recipient)
							->once
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->withArguments($recipient)
							->once
		;
	}

	function testBlockForTrueTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$iterator = new mockOfIterator,
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($test)
					->receive('blockForTrueTestIs')
						->never
				->mock($otherTest)
					->receive('blockForTrueTestIs')
						->never

			->given(
				$this->calling($iterator)->variablesForIteratorBlockAre = function($anIteratorBlock, $aTest, $anOtherTest) use ($iterator) {
					$anIteratorBlock->containerIteratorHasValue($iterator, $aTest);
					$anIteratorBlock->containerIteratorHasValue($iterator, $anOtherTest);
				}
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $test, $otherTest))
				->mock($test)
					->receive('blockForTrueTestIs')
						->withArguments($block)
							->once
				->mock($otherTest)
					->receive('blockForTrueTestIs')
						->withArguments($block)
							->once
		;
	}
}
