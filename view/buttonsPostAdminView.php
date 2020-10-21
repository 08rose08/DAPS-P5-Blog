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
      <?php 
        if (!empty($message)){
            echo ($message);
        } 
      ?>

      <div class="modal-body">
        <form method="post" action="index.php?action=updatePost&amp;id=<?= $post->id() ?>" enctype="multipart/form-data" class="mx-lg-5">
          <div class="form-group">
              <label for="id_author">Auteur</label>
              <select class="custom-select" id="id_author" name="id_author">
                  <option selected>Choisir...</option>
                  <?php foreach ($admins as $admin){ ?>
                      <option value="<?= $admin->id() ?>">
                          <?= $admin->username() ?>
                      </option>
                  <?php } ?>
              </select>
          </div>
          <div class="form-group">
              <label for="title">Titre</label>
              <input value="<?php if(!empty($postUp)){echo $postUp->title();}else{echo $postBB->title();} ?>" type="text" name="title" class="form-control" id ="title" placeholder="Titre" required />
          </div>
          <div class="form-group">
              <label for="chapo">Chapô</label>
              <input value="<?php if(!empty($postUp)){echo $postUp->chapo();}else{echo $postBB->chapo();} ?>" type="text" name="chapo" class="form-control" id ="chapo" placeholder="Chapô" required />
          </div>
          <div class="form-group">
              <label for="content">Contenu</label>
              <textarea rows="5" name="content" class="form-control" id ="content" placeholder="Contenu" required><?php if(!empty($postUp)){echo $postUp->content();}else{echo $postBB->content();} ?></textarea>
          </div>
          <div class="form-group">
            <label for="picture"> Modifier la photo (.png, .jpg, .jpeg, max 1Mo) :</label>
            <input type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" />
          </div>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>