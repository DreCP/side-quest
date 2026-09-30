<?php

require_once('Classe/CRUD.php');
require_once('Classe/NewGame.php');
require_once('Classe/UsedGame.php');

$crud = new CRUD;

if($_POST['copy_type'] == 'new'){
  $game = new NewGame(
    $_POST['title'],
    $_POST['release_date'],
    $_POST['description'],
    $_POST['max_local_players'],
    $_POST['developer_id'],
    $_POST['genre_id']
  );
}else{
  $game = new UsedGame(
    $_POST['title'],
    $_POST['release_date'],
    $_POST['description'],
    $_POST['max_local_players'],
    $_POST['developer_id'],
    $_POST['genre_id']
  );
}

$imageName = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];

move_uploaded_file($imageTemp, 'images/' . $imageName);

$dataGame = [
  'title' => $game->getTitle(),
  'release_date' => $game->getReleaseDate(),
  'description' => $game->getDescription(),
  'max_local_players' => $game->getMaxLocalPlayers(),
  'developer_id' => $game->getDeveloperId(),
  'genre_id' => $game->getGenreId(),
  'image' => $imageName
];

$gameId = $crud->insert('game', $dataGame);

$dataPlatform = [
  'game_id' => $gameId,
  'platform_id' => $_POST['platform_id'],
  'copy_type' => $game->getCopyType(),
  'price' => $_POST['price']
];

$crud->insert('game_platform', $dataPlatform);

header('location:game-index.php');