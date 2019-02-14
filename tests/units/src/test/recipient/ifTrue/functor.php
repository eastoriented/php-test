<?php namespace eastoriented\php\test\tests\units\recipient\ifTrue;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;

class functor extends units\test
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
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); })
			)

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->variable($arguments)
					->isNull

			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEmpty
		;
	}
}
