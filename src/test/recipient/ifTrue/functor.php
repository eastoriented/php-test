<?php namespace eastoriented\php\test\recipient\ifTrue;

use eastoriented\php\{ test, block };

class functor extends test\recipient\ifTrue
{
	function __construct(callable $callable)
	{
		parent::__construct(new block\functor($callable));
	}
}
