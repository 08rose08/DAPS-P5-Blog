<div class="d-flex flex-column">
    <button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i></button>
    <button type="button" class="btn btn-primary p-1 mt-1" data-toggle="modal" data-target="#postUpdateModal"><i class="fas fa-pencil-alt"></i></button>
    
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLongTitle">Supprimer le post ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="index.php?action=deletePost&amp;id=<?= $post->id() ?>">
            <div class="form-group">
                Attention, la supression du post est définitive.
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="postUpdateModal" tabindex="-1" role="dialog" aria-labelledby="modalDeletePostTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDeletePostTitle">Modifier le post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="index.php?action=updatePost&amp;id=<?= $post->id() ?>" class="mx-lg-5">
        
            <div class="form-group">
                <label for="title">Titre</label>
                <input value="<?= $post->title(); ?>" type="text" name="title" class="form-control" id ="title" placeholder="Titre" required />
            </div>
            <div class="form-group">
                <label for="chapo">Chapô</label>
                <input value="<?= $post->chapo(); ?>" type="text" name="chapo" class="form-control" id ="chapo" placeholder="Chapô" required />
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea rows="5" name="content" class="form-control" id ="content" placeholder="Contenu" required><?= $post->content(); ?></textarea>
            </div>
        
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>