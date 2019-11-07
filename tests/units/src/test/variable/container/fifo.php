<?php namespace eastoriented\php\test\tests\units\variable\container;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\variable\container')
		;
	}

	function testIteratorBlockForTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$block = new mockOfIterator\block\test,

				$this->calling($block)->iteratorHasTest = function($anIterator, $aTest) use (& $tests, $test) {
					$tests[] = $aTest;
				}
			)
			->if(
				$this->testedInstance->iteratorBlockForTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->array($tests)
					->isEqualTo([ $test, $otherTest ])
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$recipient = new mockOfTest\recipient,

				$this->calling($test)->recipientOfTestIs = function($aRecipient) use (& $tests, $test) {
					$tests[] = $test;
				},

				$this->calling($otherTest)->recipientOfTestIs = function($aRecipient) use (& $tests, $otherTest) {
					$tests[] = $otherTest;
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->array($tests)
					->isEqualTo([ $test, $otherTest ])
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
					$test = new mockOfTest\variable,
					$otherTest = new mockOfTest\variable
				),
				$block = new mockOfBlock,

			$this->calling($test)->blockForTrueTestIs = function($aBlock) use (& $tests, $test) {
					$tests[] = $test;
				},

				$this->calling($otherTest)->blockForTrueTestIs = function($aBlock) use (& $tests, $otherTest) {
					$tests[] = $otherTest;
				}
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->array($tests)
					->isEqualTo([ $test, $otherTest ])
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
