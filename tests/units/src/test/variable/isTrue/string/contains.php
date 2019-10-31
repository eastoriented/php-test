<?php namespace eastoriented\php\test\tests\units\variable\isTrue\string;

require __DIR__ . '/../../../../../runner.php';

use eastoriented\tests\units;
use mock\eastoriented\php\block as mockOfBlock;
use mock\eastoriented\php\test\recipient as mockOfRecipient;

class contains extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('eastoriented\php\test\variable')
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					'foo',
					'a'
				),
				$recipient = new mockOfRecipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'a'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->given(
				$this->newTestedInstance(
					'foo',
					'f'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'f'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->given(
				$this->newTestedInstance(
					'foo',
					'o'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'o'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->twice

			->given(
				$this->newTestedInstance(
					'foo',
					'x',
					'f'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'x', 'f'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->thrice
		;
	}

	function testBlockForTrueTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					'foo',
					'a'
				),
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'a'))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$this->newTestedInstance(
					'foo',
					'f'
				)
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'f'))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->once

			->given(
				$this->newTestedInstance(
					'foo',
					'o'
				)
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'o'))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->twice

			->given(
				$this->newTestedInstance(
					'foo',
					'x',
					'f'
				)
			)
			->if(
				$this->testedInstance->blockForTrueTestIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'x', 'f'))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->thrice
		;
	}
}
