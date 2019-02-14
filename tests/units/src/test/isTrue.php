<?php namespace eastoriented\php\test\tests\units;

require __DIR__ . '/../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class isTrue extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test')
		;
	}

	/**
	 * @dataProvider trueProvider
	 */
	function testRecipientOfTestOnVariableIs_withTrue($variable)
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
						->withArguments(true)
							->once
		;
	}

	protected function trueProvider()
	{
		return [
			'1' => 1,
			'not empty string' => uniqid(),
			'true' => true,
			'postive integer' => rand(1, PHP_INT_MAX),
			'negative integer' => rand(PHP_INT_MIN, -1),
			'PI' => M_PI,
			'not empty array' => [[ uniqid() ]],
			'object' => new \stdClass
		];
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
			'null' => null,
			'false' => false,
			'empty string' => '',
			'zero' => 0,
			'zero as float' => 0.,
			'empty array' => [[]]
		];
	}
}
