<?php

namespace App;

class Object
{
	/**
	 * @var int
	 */
	private $x;

	/**
	 * @var int
	 */
	private $y;

	/**
	 * @var string
	 */
	private $char;

	/**
	 * @var string
	 */
	private $direction;

	/**
	 * @param int    $x
	 * @param int    $y
	 * @param string $char
	 */
	public function __construct(int $x, int $y)
	{
		$this->x = $x;
		$this->y = $y;
		$this->char = '*';
		$this->direction = Direction::RIGHT;
	}

	/**
	 * @return int
	 */
	public function getX()
	{
		return $this->x;
	}

	/**
	 * @return int
	 */
	public function getY()
	{
		return $this->y;
	}

	/**
	 * @return string
	 */
	public function getChar()
	{
		return $this->char;
	}

	/**
	 * @param string $char
	 */
	public function setChar($char)
	{
		$this->char = $char;
	}

	/**
	 * @param string $input
	 *
	 */
	public function move(string $input)
	{
		$this->changeDirection($input);
	}

	/**
	 * @param string $input
	 */
	private function changeDirection(string $input)
	{
		if ('w' === $input && $this->direction != Direction::DOWN) {
			$this->direction = Direction::UP;
			$this->y--;
		} elseif ('a' === $input && $this->direction != Direction::RIGHT) {
			$this->direction = Direction::LEFT;
			$this->x--;
		} elseif ('s' === $input && $this->direction != Direction::UP) {
			$this->direction = Direction::DOWN;
			$this->y++;
		} elseif ('d' === $input && $this->direction != Direction::LEFT) {
			$this->direction = Direction::RIGHT;
			$this->x++;
		}
	}
}
