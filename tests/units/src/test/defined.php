<?php namespace eastoriented\php\test\tests\units;

require __DIR__ . '/../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class defined extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs_withNull()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(null, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
	function testRecipientOfTestOnVariableIs_withNotNull($variable)
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
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
			0,
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			true,
			false,
			[[]],
			new \stdclass
		];
	}
}
