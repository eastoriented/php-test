<?php namespace eastoriented\php\container\tests\units\iterator\block\test\ifTrue\iterator;

require __DIR__ . '/../../../../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\php\test\recipient;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class breaker extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\container\iterator\block\test')
		;
	}

	function testIteratorHasTest()
	{
		$this
			->given(
				$this->newTestedInstance(
					$recipient = new mockOfTest\recipient
				),
				$iterator = new mockOfIterator,
				$test = new mockOfTest\variable
			)
			->if(
				$this->testedInstance->iteratorHasTest($iterator, $test)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($test)
					->receive('recipientOfTestIs')
						->withArguments(new recipient\container\fifo\ifTrue\iterator\breaker($iterator, $recipient))
							->once
		;
	}
}
