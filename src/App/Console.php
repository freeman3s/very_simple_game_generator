<?php

namespace App;

class Console
{
	/**
	 * @return string
	 */
	public function getInput()
	{
		readline_callback_handler_install('', function () {});
		$input = stream_get_contents(STDIN, 1);
		readline_callback_handler_remove();

		return $input;
	}
}