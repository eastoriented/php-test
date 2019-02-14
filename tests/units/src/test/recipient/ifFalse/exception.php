<?php namespace eastoriented\php\test\tests\units\recipient\ifFalse;

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
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))

				->exception(function() { $this->testedInstance->booleanIs(false); })
					->isEqualTo($exception)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))
		;
	}
}
