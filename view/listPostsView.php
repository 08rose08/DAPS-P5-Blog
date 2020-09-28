<?php 
    $this->title = 'Mon Blog : la liste';
    $this->page = 'Le blog-recettes';
?>

<main class="bg-black p-3">
    <?php
    foreach ($posts as $post){
    ?>
        <div class="card bg-light m-3 p-3">
            <h2><a href='index.php?action=getOnePost&amp;id=<?= $post->id() ?>'><?= $post->title() ?></a></h2>
            <p><?= $post->chapo() ?></p>
            <p>Par <?= $post->name() ?> le <?= $post->last_update_date() ?></p>
        </div>
    <?php } ?>
</main>
