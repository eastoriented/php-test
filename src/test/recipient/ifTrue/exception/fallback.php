<?php namespace eastoriented\php\test\recipient\ifTrue\exception;

use eastoriented\php\test\recipient\ifTrue\exception;

class fallback extends exception
{
	function __construct(\exception $default, \exception $exception = null)
	{
		parent::__construct($exception ?: $default);
	}
}
