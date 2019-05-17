<?php

namespace App;

class Map
{
	/**
	 * @var int
	 */
	private $width;

	/**
	 * @var int
	 */
	private $height;

	/**
	 * @var array
	 */
	private $map;

	public function __construct()
	{
		$this->width = intval(`tput cols`);
		$this->height = intval(`tput lines`);
		$this->initialize();
	}

	private function initialize()
	{
		for ($i = 1; $i < $this->height; ++$i) {
			$this->map[$i] = array_fill(0, $this->width, ' ');
		}
	}

	public function draw()
	{
		for ($i = 1; $i < $this->height; ++$i) {
			for ($j = 1; $j < $this->width; ++$j) {
				if ($this->map[$i][$j] instanceof Object) {
					echo $this->map[$i][$j]->getChar();
				} else {
					echo $this->map[$i][$j];
				}
			}
			echo "\n";
		}
	}

	public function put(Object $object)
	{
		// $this->initialize();
		$this->map[$object->getY()][$object->getX()] = $object;
	}

	public function moveObject(Object $object, string $input)
	{
		$current = clone $object;
		$this->map[$current->getY()][$current->getX()] = ' ';

		$object->move($input);
		
		$this->checkCollision($current, $object);
	}

	private function checkCollision(Object $current, Object $next)
	{
		$next = $this->map[$next->getY()][$next->getX()];
		$current->checkCollision($next);
	}
}