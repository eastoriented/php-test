<?php namespace eastoriented\php\test\recipient\ifTrue\iterator;

use eastoriented\php\{ test, block, container\iterator };

class breaker extends test\recipient\ifTrue
{
	function __construct(iterator $iterator)
	{
		parent::__construct(new block\iterator\breaker($iterator));
	}
}
