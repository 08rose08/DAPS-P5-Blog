

<?php $title = 'Mon Blog : la liste'; ?>

<?php ob_start(); ?>

<h1>La liste des recettes</h1>

<?php
foreach ($posts as $post){
?>
    
    <h2><a href='index.php?action=getOnePost&amp;id=<?php echo $post->id() ?>'><?php echo $post->title() ?></a></h2>
    <p><?php echo $post->chapo() ?></p>
    <p>Par <?php echo $post->name() ?> le <?php echo $post->last_update_date() ?></p>

<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>


