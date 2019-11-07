<?php namespace eastoriented\php\test\tests\units\isBoolean;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class strictly extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs_withTrue()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfRecipient
			)

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(true, $recipient)
			)
			->then
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}

	function testRecipientOfTestOnVariableIs_withFalse()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfRecipient
			)

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(false, $recipient)
			)
			->then
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}

	/**
	 * @dataProvider notBooleanProvider
	 */
	function testRecipientOfTestOnVariableIs_withNotTrue($variable)
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfRecipient
			)

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
		;
	}

	protected function notBooleanProvider()
	{
		return [
			null,
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			[[]],
			new \stdClass
		];
	}
}
