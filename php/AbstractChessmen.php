<?php
require_once ('php/IChessmen.php');

abstract class AbstractChessmen implements IChessmen{
  public $name;
  public $x;
  public $y;
  abstract public function move (int $x, int $y);
  public function getPosition(int $x,int $y) {
    $this->x = $x;
    $this->y = $y;
  }
  public function show_position() {
    echo "Позиция ".$this->name.": ".$this->x.' : '.$this->y;
  }
}
