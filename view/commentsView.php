<h3>Les commentaires :</h3>

<?php
foreach ($comments as $comment){
?>
    <div class="card card-body p-0 p-md-3">
        <p class="card-text "><?= htmlspecialchars($comment->content()) ?></p>
        <p class="card-text font-italic">Par <?= htmlspecialchars($comment->username()) ?> le <?= htmlspecialchars($comment->creation_date()) ?></p>
    </div>

<?php } ?>

<?php include 'addCommentView.php'; ?>