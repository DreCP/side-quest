<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$imageName = $_POST['current_image'];

if($_FILES['image']['name'] != ''){
  $imageName = $_FILES['image']['name'];
  $imageTemp = $_FILES['image']['tmp_name'];

  move_uploaded_file($imageTemp, 'images/' . $imageName);
}

$dataGame = [
  'id' => $_POST['id'],
  'title' => $_POST['title'],
  'release_date' => $_POST['release_date'],
  'description' => $_POST['description'],
  'max_local_players' => $_POST['max_local_players'],
  'developer_id' => $_POST['developer_id'],
  'genre_id' => $_POST['genre_id'],
  'image' => $imageName
];

$crud->update('game', $dataGame);

header('location:game-show.php?id=' . $_POST['id']);