<?php $title = 'Mon blog : le post'; ?>
<?php $page = 'La recette'; ?>

<?php ob_start(); ?>

<main class="bg-black p-3">
    <div class="card card-body bg-light m-3 p-3">

        <h2 class="card-title"><?= $post->title(); ?></h2>
        <p class="card-subtitle font-italic">Par <?= $post->name() ?> le <?= $post->last_update_date() ?></p>
        <p class="card-text"><?= $post->content() ?></p> 
        <hr class="my-4" />
        <?php include('commentsView.php'); ?>
    </div>

</main>  
    
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>