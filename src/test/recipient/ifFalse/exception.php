<?php namespace eastoriented\php\test\recipient\ifFalse;

use eastoriented\php\test\recipient\{
	not,
	ifTrue
};

class exception extends not
{
	function __construct(\exception $exception)
	{
		parent::__construct(new ifTrue\exception($exception));
	}
}
