<?php namespace eastoriented\php\test\tests\units\recipient\ifTrue\iterator;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class breaker extends units\test
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
				$this->newTestedInstance($iterator = new mockOfIterator)
			)
			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator))
				->mock($iterator)
					->receive('nextIterationAreUseless')
						->never

			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator))
				->mock($iterator)
					->receive('nextIterationAreUseless')
						->once
		;
	}
}
