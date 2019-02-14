<?php namespace eastoriented\php\test\tests\units\recipient\ifTrue;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;

class exception extends units\test
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
				$this->newTestedInstance($exception = new \mock\exception)
			)
			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))

				->exception(function() { $this->testedInstance->booleanIs(true); })
					->isEqualTo($exception)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))
		;
	}
}
