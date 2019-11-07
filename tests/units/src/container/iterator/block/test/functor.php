<?php namespace eastoriented\php\container\tests\units\iterator\block\test;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use eastoriented\php\test\recipient;
use mock\eastoriented\php\test as mockOfTest;
use mock\eastoriented\php\container\iterator as mockOfIterator;

class functor extends units\test
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
					$callable = function($anIterator, $aTest) use (& $arguments) {
						$arguments = func_get_args();
					}
				),
				$iterator = new mockOfIterator,
				$test = new mockOfTest\variable
			)
			->if(
				$this->testedInstance->iteratorHasTest($iterator, $test)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $iterator, $test ])
		;
	}
}
