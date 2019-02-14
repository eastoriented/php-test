<?php namespace eastoriented\php\test\tests\units\variable;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class defined extends units\test
{
	function testRecipientOfTestIs_withNull()
	{
		$this
			->given(
				$this->newTestedInstance(null),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(null))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(false)
								->once
		;
	}

	/**
	 * @dataProvider notNullVariableProvider
	 */
	function testRecipientOfTestIs_withNotNull($variable)
	{
		$this
			->given(
				$this->newTestedInstance($variable),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($variable))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(true)
								->once
		;
	}

	protected function notNullVariableProvider()
	{
		return [
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			false,
			true,
			[ [] ],
			new \stdClass
		];
	}
}
