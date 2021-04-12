<?php
require_once ('php/AbstractChessmen.php');

class Queen extends AbstractChessmen
{
  public function __construct($x, $y)
  {
    $this->name = 'Queen';
    $this->x = $x;
    $this->y = $y;
  }

  private function check(int $x, int $y): bool
  {
    if (!(($x < 8 && $x > 0 && $y < 8 && $y > 0)&&(($y == $this->y) || ( $x == $this->x) || ($this->x + $x == $this->y + $y)))) {
      throw new Exception('Движение не возможно для фигуры '.$this->name);
    }
    return true;
  }
  //я бы это тоэе вынесла, но к сожелению нельзя по заданию
  public function move(int $x, int $y)
  {
    try {
      $this->check($x,$y);
      $this->x = $x;
      $this->y = $y;
    } catch (Exception $e) {
      echo 'Выброшено исключение: ', $e->getMessage(), "\n";
    }
  }
}
