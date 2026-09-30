<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$game = $crud->selectId('game', $_GET['id']);
$developers = $crud->select('developer', 'name');
$genres = $crud->select('genre', 'name');

$title = "Edit Game - Side Quest";
include_once('header.php');

?>

<div class="form-container">

  <h2>Edit Game</h2>

  <form class="game-form" action="game-update.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $game['id'] ?>">
    <input type="hidden" name="current_image" value="<?= $game['image'] ?>">

    <div>
      <label>Title</label>
      <input type="text" name="title" value="<?= $game['title'] ?>" required>
    </div>

    <div>
      <label>Release Date</label>
      <input type="date" name="release_date" value="<?= $game['release_date'] ?>" required>
    </div>

    <div>
      <label>Description</label>
      <textarea name="description" required><?= $game['description'] ?></textarea>
    </div>

    <div>
      <label>Max Local Players</label>
      <input type="number" name="max_local_players" value="<?= $game['max_local_players'] ?>" min="1" required>
    </div>

    <div>
      <label>Developer</label>
      <select name="developer_id" required>

        <?php
        foreach($developers as $developer){
          $selected = '';

          if($developer['id'] == $game['developer_id']){
            $selected = 'selected';
          }
        ?>

        <option value="<?= $developer['id'] ?>" <?= $selected ?>>
          <?= $developer['name'] ?>
        </option>

        <?php
        }
        ?>

      </select>
    </div>

    <div>
      <label>Genre</label>
      <select name="genre_id" required>

        <?php
        foreach($genres as $genre){
          $selected = '';

          if($genre['id'] == $game['genre_id']){
            $selected = 'selected';
          }
        ?>

        <option value="<?= $genre['id'] ?>" <?= $selected ?>>
          <?= $genre['name'] ?>
        </option>

        <?php
        }
        ?>

      </select>
    </div>

    <div>
      <label>Current Box Artwork</label>
      <img class="current-artwork" src="images/<?= $game['image'] ?>" alt="<?= $game['title'] ?>">
    </div>

    <div>
      <label>New Box Artwork</label>
      <input type="file" name="image" accept="image/*">
    </div>

    <div>
      <input type="submit" value="Update Game">
    </div>

  </form>

  <a class="back-button yellow-button" href="game-show.php?id=<?= $game['id'] ?>">Back to Game</a>

</div>

<?php include_once('footer.php'); ?>