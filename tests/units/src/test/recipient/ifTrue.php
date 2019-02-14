<?php namespace eastoriented\php\test\tests\units\recipient;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\block as mockOfBlock;

class ifTrue extends units\test
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
				$this->newTestedInstance($block = new mockOfBlock)
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->once

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->once
		;
	}
}
