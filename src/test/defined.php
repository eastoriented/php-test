<?php namespace eastoriented\php\test;

class defined extends undefined
{
	function recipientOfTestOnVariableIs($variable, recipient $recipient) :void
	{
		parent::recipientOfTestOnVariableIs(
			$variable,
			new recipient\not($recipient)
		);
	}
}
