<?php namespace eastoriented\php\test\tests\units\variable\isBoolean\strictly;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;
use mock\eastoriented\php\block as mockOfBlock;

class forwarder extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\variable')
		;
	}

	function testRecipientOfTestIs_withTrue()
	{
		$this
			->given(
				$this->newTestedInstance(true),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(true))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(true)
								->once
		;
	}

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
							->withArguments(false)
								->once
		;
	}

	function testBlockForTrueTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(false),
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(false))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(false)
							->once
		;
	}

	/**
	 * @dataProvider notBooleanProvider
	 */
	function testRecipientOfTestIs_withNotBoolean($variable)
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
						->never
		;
	}

	protected function notBooleanProvider()
	{
		return [
			'null' => null,
			'empty string' => '',
			'not empty string' => uniqid(),
			'any integer' => rand(PHP_INT_MIN, PHP_INT_MAX),
			'PI' => M_PI,
			'empty array' => [ [] ],
			'object' => new \stdClass
		];
	}
}
