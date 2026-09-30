<?php

require_once('Game.php');

class NewGame extends Game
{
  public function getCopyType()
  {
    return "new";
  }
}