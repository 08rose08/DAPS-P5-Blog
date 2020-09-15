<?php $title = 'Recette'; ?>

<?php ob_start(); ?>

<h1><?php echo $post->title(); ?></h1>
<p>Par <?php echo $post->name() ?> le <?php echo $post->last_update_date() ?></p>
<p><?php echo $post->content() ?></p> 


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>