<?php 
    $this->title = 'Blog : admin';
    $this->page = 'Moderation';
?>

<main class="bg-black p-3">
    <?php
    foreach ($comments as $comment){
    ?>
        <div class="card card-body  bg-light m-3 p-3">
            <p class="card-text "><?= $comment->content() ?></p>
            <p class="card-text font-italic">Par <?= $comment->username() ?> le <?= $comment->creation_date() ?></p>
            <p><button type="button" class="btn btn-primary col-md-4 mt-1">Valider</button>
            <button type="button" class="btn btn-danger col-md-4 mt-1">Supprimer</button></p>
        </div>
    <?php } ?>
</main>