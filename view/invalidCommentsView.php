<?php 
    $this->title = 'Blog : admin';
    $this->page = 'Moderation';
?>

<main class="bg-black p-3">
    <?php
    foreach ($comments as $comment){
    ?>
        <div class="card card-body  bg-light m-3 p-3">
            <p class="card-text "><?= $comment->content() ?></p>
            <p class="card-text font-italic">Par <?= $comment->username() ?> le <?= $comment->creation_date() ?></p>
            <p>
                <a href="index.php?action=validateComment&amp;id=<?= $comment->id() ?>" class="btn btn-primary col-md-4 mt-1">Valider</a>
                <button type="button" class="btn btn-danger col-md-4 mt-1" data-toggle="modal" data-target="#deleteCommentModal">Supprimer</button>
            </p>
        </div>

        <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="modalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLongTitle">Supprimer le commentaire ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>">
                            <div class="form-group">
                                Attention, la supression du commentaire est définitive.
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</main>