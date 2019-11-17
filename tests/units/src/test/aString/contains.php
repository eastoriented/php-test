<?php namespace eastoriented\php\test\tests\units\aString;

require __DIR__ . '/../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class contains extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\aString')
		;
	}

	function testRecipientOfTestOnStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$needle = 'foo'
				),
				$string = 'bar',
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($needle))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->given(
				$string = $needle
			)
			->if(
				$this->testedInstance->recipientOfTestOnStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($needle))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}

	function testBlockForTrueTestOnSTringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$needle = 'foo'
				),
				$string = 'bar',
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForTrueTestOnStringIs($string, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($needle))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$string = $needle
			)
			->if(
				$this->testedInstance->blockForTrueTestOnStringIs($string, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($needle))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
		;
	}

}
