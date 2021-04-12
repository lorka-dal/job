<?php
require_once ('php/AbstractChessmen.php');

class King extends AbstractChessmen
{
  public function __construct ($x, $y)
  {
    $this -> name = 'King';
    $this -> x = $x;
    $this -> y = $y;
  }
  private function check(int $x, int $y): bool
  {
    if(!(((($this->x == $x+1)||($this->x == $x-1))||(($this->y == $y+1)&&($this->y == $y-1)))&&($x > 0 && $x < 9)&&($y > 0 && $y < 9))){
      throw new Exception('Движение не возможно для фигуры '.$this->name );
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
    }catch(Exception $e){
      echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
    }
  }
}
