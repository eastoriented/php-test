<?php namespace eastoriented\php\test\tests\units\recipient;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use eastoriented\php\test\recipient;

class variable extends units\test
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
				$recipient = new recipient\variable($variable)
			)
			->if(
				$recipient->booleanIs(true)
			)
			->then
				->object($recipient)
					->isEqualTo(new recipient\variable($variable))
				->boolean($variable)
					->isEqualTo(true)

			->if(
				$recipient->booleanIs(false)
			)
			->then
				->object($recipient)
					->isEqualTo(new recipient\variable($variable))
				->boolean($variable)
					->isEqualTo(false)
		;
	}
}
