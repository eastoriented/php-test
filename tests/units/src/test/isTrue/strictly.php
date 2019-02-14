<?php namespace eastoriented\php\test\tests\units\isTrue;

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

	/**
	 * @dataProvider notTrueProvider
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

	protected function notTrueProvider()
	{
		return [
			null,
			false,
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			[[]],
			new \stdClass
		];
	}
}
