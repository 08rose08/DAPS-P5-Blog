

<?php $title = 'Mon Blog : la liste'; ?>
<?php $page = 'Le blog-recettes'; ?>

<?php ob_start(); ?>

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

<?php $content = ob_get_clean(); ?>

<?php
    if (isset($_SESSION['id']) AND isset($_SESSION['username'])) {
        require 'templateLogin.php';
    }else{
        require 'template.php'; 
    }
?>


