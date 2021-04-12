<?php


interface IChessmen{
  public function move(int $x, int $y);
  public function getPosition(int $x, int $y);
  public function show_position ();
}
