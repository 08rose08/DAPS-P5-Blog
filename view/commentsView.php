<h3>Les commentaires :</h3>

<?php
foreach ($comments as $comment){
?>
    <div class="card card-body p-0 p-md-3">
        <p class="card-text "><?php echo $comment->content() ?></p>
        <p class="card-text font-italic">Par <?php echo $comment->name() ?> le <?php echo $comment->creation_date() ?></p>
    </div>

<?php } ?>

<?php include 'commentFormView.php'; ?>