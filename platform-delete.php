<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$crud->deleteGamePlatform(
    $_GET['game_id'],
    $_GET['platform_id'],
    $_GET['copy_type']
);

header('location:game-show.php?id=' . $_GET['game_id']);