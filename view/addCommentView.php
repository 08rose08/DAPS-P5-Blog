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


        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Veuillez écrire votre nom svp.">
            </div>
            <div class="form-group">
                <label for="content">Commentaire</label>
                <textarea class="form-control" id="content" rows="3" required data-validation-required-message="Veuillez écrire votre commentaire svp."></textarea>
            </div>
        </form>
      
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Envoyer</button>
      </div>
    </div>
  </div>
</div>