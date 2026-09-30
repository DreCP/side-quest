<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$game = $crud->selectId('game', $_GET['id']);

$developer = $crud->selectId('developer', $game['developer_id']);
$genre = $crud->selectId('genre', $game['genre_id']);

$gamePlatforms = $crud->select('game_platform', 'game_id');

$title = $game['title'] . " - Side Quest";
include_once('header.php');

?>

<h2><?= $game['title'] ?></h2>

<div class="game-details">

    <div class="game-image">
        <img src="images/<?= $game['image'] ?>" alt="<?= $game['title'] ?>">
    </div>

    <div class="game-info">
        <p><strong>Release Date:</strong> <?= $game['release_date'] ?></p>

        <p><strong>Developer:</strong> <?= $developer['name'] ?></p>

        <p><strong>Genre:</strong> <?= $genre['name'] ?></p>

        <p><strong>Max Local Players:</strong> <?= $game['max_local_players'] ?></p>

        <h3>Description</h3>

        <p><?= $game['description'] ?></p>

        <h3>Formats</h3>

        <?php
        foreach($gamePlatforms as $gamePlatform){
            if($gamePlatform['game_id'] == $game['id']){
                $platform = $crud->selectId('platform', $gamePlatform['platform_id']);
        ?>

        <p>
            <?= $platform['name'] ?> -
            <?= $gamePlatform['copy_type'] ?> -
            $<?= $gamePlatform['price'] ?>
        </p>

        <?php
            }
        }
        ?>

    </div>

</div>

<div class="game-actions">
    <a class="back-button" href="game-index.php">Back to Games</a>
    <a class="button" href="game-edit.php?id=<?= $game['id'] ?>">Edit Game</a>
    <a class="delete-button" href="game-delete.php?id=<?= $game['id'] ?>">Delete Game</a>
</div>

<?php include_once('footer.php'); ?>