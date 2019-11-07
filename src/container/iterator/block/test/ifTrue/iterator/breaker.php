<?php namespace eastoriented\php\container\iterator\block\test\ifTrue\iterator;

use eastoriented\php\test\{ variable as test, recipient };
use eastoriented\php\container\{ iterator, iterator\block };

class breaker
	implements
		block\test
{
	private
		$recipient
	;

	function __construct(recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function iteratorHasTest(iterator $iterator, test $test) :void
	{
		$test
			->recipientOfTestIs(
				new recipient\container\fifo\ifTrue\iterator\breaker(
					$iterator,
					$this->recipient
				)
			)
		;
	}
}
