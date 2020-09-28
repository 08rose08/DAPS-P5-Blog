<button type="button" class="btn btn-primary col-md-4 mt-1" data-toggle="modal" data-target="#commentFormModal">Commenter</button>

<div class="modal fade" id="commentFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Commenter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>">
            <div class="form-group">
                <label for="content">Commentaire</label>
                <textarea class="form-control" name="content" id="content" rows="3" required data-validation-required-message="Veuillez écrire votre commentaire svp."></textarea>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>