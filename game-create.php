<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$developers = $crud->select('developer', 'name');
$genres = $crud->select('genre', 'name');
$platforms = $crud->select('platform', 'name');

$title = "Add a Game - Side Quest";
include_once('header.php');

?>

<div class="form-container">

  <h2>Add a Game</h2>

  <form class="game-form" action="game-store.php" method="post" enctype="multipart/form-data">

    <div>
      <label>Title</label>
      <input type="text" name="title" required>
    </div>

    <div>
      <label>Release Date</label>
      <input type="date" name="release_date" required>
    </div>

    <div>
      <label>Description</label>
      <textarea name="description" required></textarea>
    </div>

    <div>
      <label>Max Local Players</label>
      <input type="number" name="max_local_players" min="1" required>
    </div>

    <div>
      <label>Developer</label>
      <select name="developer_id">

        <?php
        foreach($developers as $developer){
        ?>

        <option value="<?= $developer['id'] ?>">
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
        ?>

        <option value="<?= $genre['id'] ?>">
          <?= $genre['name'] ?>
        </option>

        <?php
        }
        ?>

      </select>
    </div>

    <div>
        <label>Platform</label>
        <select name="platform_id" required>

          <?php
          foreach($platforms as $platform){
          ?>

          <option value="<?= $platform['id'] ?>">
            <?= $platform['name'] ?>
          </option>

          <?php
          }
          ?>

        </select>
    </div>

    <div>
        <label>Copy Type</label>
        <select name="copy_type" required>
          <option value="new">New</option>
          <option value="used">Used</option>
        </select>
    </div>

    <div>
      <label>Price</label>
      <input type="number" name="price" step="0.01" min="0" required>
    </div>

    <div>
      <label>Box Artwork</label>
      <input type="file" name="image" accept="image/*" required>
    </div>

    <div>
      <input type="submit" value="Add Game">
    </div>

  </form>

  <a class="back-button" href="game-index.php">Back to Games</a>

</div>

<?php include_once('footer.php'); ?>