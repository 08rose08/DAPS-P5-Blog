<?php $title = 'Recette'; ?>

<?php ob_start(); ?>

<header class="masthead-list">
    <div class="container d-flex h-20 align-items-center">
        
        <div class="mx-auto text-center">
            <h1 class="mx-auto text-uppercase">La recette</h1>
        </div>
    </div>
</header>
<main class="bg-black p-3">
    <div class="card card-body bg-light m-3 p-3">

        <h2 class="card-title"><?php echo $post->title(); ?></h2>
        <p class="card-subtitle font-italic">Par <?php echo $post->name() ?> le <?php echo $post->last_update_date() ?></p>
        <p class="card-text"><?php echo $post->content() ?></p> 
        <hr class="my-4" />
        <?php include('commentsView.php'); ?>
    </div>

</main>  
    
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>