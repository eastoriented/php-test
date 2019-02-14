<?php namespace eastoriented\php\test\tests\units\recipient;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class not extends units\test
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
				$this->newTestedInstance(
					$recipient = new mockOfRecipient
				)
			)

			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
