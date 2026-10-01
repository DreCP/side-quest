<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

$game = $crud->selectId('game', $_GET['id']);
$platforms = $crud->select('platform', 'name');

$title = "Add Platform - Side Quest";
include_once('header.php');

?>

<div class="form-container">

    <h2>Add Platform</h2>

    <p>Add a new format for <strong><?= $game['title'] ?></strong></p>

    <form class="game-form" action="platform-store.php" method="post">

        <input type="hidden" name="game_id" value="<?= $game['id'] ?>">

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
            <input type="submit" value="Add Platform">
        </div>

    </form>

    <a class="back-button" href="game-show.php?id=<?= $game['id'] ?>">Back to Game</a>

</div>

<?php include_once('footer.php'); ?>