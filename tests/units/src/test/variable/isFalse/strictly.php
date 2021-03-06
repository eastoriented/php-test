<?php namespace eastoriented\php\test\tests\units\variable\isFalse;

require __DIR__ . '/../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class strictly extends units\test
{
	function testRecipientOfTestIs_withFalse()
	{
		$this
			->given(
				$this->newTestedInstance(false),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(false))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(true)
								->once
		;
	}

	/**
	 * @dataProvider notFalseVariableProvider
	 */
	function testRecipientOfTestIs_withNotFalse($variable)
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
						->withArguments(false)
							->once
		;
	}

	protected function notFalseVariableProvider()
	{
		return [
			'null' => null,
			'empty string' => '',
			'not empty string' => uniqid(),
			'any integer' => rand(PHP_INT_MIN, PHP_INT_MAX),
			'PI' => M_PI,
			'true' => true,
			'empty array' => [ [] ],
			'object' => new \stdClass
		];
	}
}
