<h2>Les commentaires :</h1>

<?php
foreach ($comments as $comment){
?>

    <p><?php echo $comment->content() ?></p>
    <p>Par <?php echo $comment->name() ?> le <?php echo $comment->creation_date() ?></p>

<?php } ?>