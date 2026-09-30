<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;
$games = $crud->select('game', 'title');

$title = "Games - Side Quest";
include_once('header.php');

?>

<div class="page-title">
  <h2>Games</h2>
  <a class="button" href="game-create.php">Add a Game</a>
</div>

<table>
  <tr>
    <th>Artwork</th>
    <th>Title</th>
    <th>Release Date</th>
    <th>Actions</th>
  </tr>

  <?php
  foreach($games as $game){
  ?>

  <tr>
    <td>
      <img src="images/<?= $game['image'] ?>" alt="<?= $game['title'] ?>">
    </td>
    <td><?= $game['title'] ?></td>
    <td><?= $game['release_date'] ?></td>
    <td>
      <a href="game-show.php?id=<?= $game['id'] ?>">View</a>
    </td>
  </tr>

  <?php
  }
  ?>
</table>

<?php include_once('footer.php'); ?>