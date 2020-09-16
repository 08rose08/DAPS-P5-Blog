

<?php $title = 'Mon Blog : la liste'; ?>

<?php ob_start(); ?>

<header class="masthead-list">
    <div class="container d-flex h-20 align-items-center">
        
        <div class="mx-auto text-center">
            <h1 class="mx-auto text-uppercase">Le blog-recettes</h1>
        </div>
    </div>
</header>

<main class="bg-black p-3">
    <?php
    foreach ($posts as $post){
    ?>
        <div class="card bg-light m-3 p-3">
            <h2><a href='index.php?action=getOnePost&amp;id=<?php echo $post->id() ?>'><?php echo $post->title() ?></a></h2>
            <p><?php echo $post->chapo() ?></p>
            <p>Par <?php echo $post->name() ?> le <?php echo $post->last_update_date() ?></p>
        </div>
    <?php } ?>
</main>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>


