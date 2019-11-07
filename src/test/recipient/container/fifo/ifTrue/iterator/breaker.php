<?php namespace eastoriented\php\test\recipient\container\fifo\ifTrue\iterator;

use eastoriented\php\{ test\recipient, container\iterator };

class breaker extends recipient\container\fifo
{
	function __construct(iterator $iterator, recipient... $recipients)
	{
		parent::__construct(new recipient\ifTrue\iterator\breaker($iterator), ... $recipients);
	}
}
