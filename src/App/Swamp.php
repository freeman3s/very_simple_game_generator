<?php

namespace App;

class Swamp extends Object
{
	public function __construct(int $x, int $y)
	{
		parent::__construct($x, $y);
		$this->setChar('S');
	}
}
