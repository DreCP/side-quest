<?php

require_once('Game.php');

class UsedGame extends Game
{
  public function getCopyType()
  {
    return "used";
  }
}