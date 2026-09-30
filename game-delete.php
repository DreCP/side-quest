<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$game = $crud->selectId('game', $_GET['id']);

$crud->delete('game_platform', $_GET['id'], 'game_id');
$crud->delete('game', $_GET['id']);

if($game['image'] != ''){
  unlink('images/' . $game['image']);
}

header('location:game-index.php');