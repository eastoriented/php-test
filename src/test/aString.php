<?php namespace eastoriented\php\test;

use eastoriented\php\block;

interface aString
{
	function recipientOfTestOnStringIs(string $string, recipient $recipient) :void;
	function blockForTrueTestOnStringIs(string $string, block $block) :void;
}
