<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$dataPlatform = [
    'game_id' => $_POST['game_id'],
    'platform_id' => $_POST['platform_id'],
    'copy_type' => $_POST['copy_type'],
    'price' => $_POST['price']
];

$crud->insert('game_platform', $dataPlatform);

header('location:game-show.php?id=' . $_POST['game_id']);