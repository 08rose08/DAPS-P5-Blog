<?php 
    $this->title = 'Blog : écrire un post';
    $this->page = 'Nouveau post';
?>


<?php 
if (!empty($message)){
    echo ($message);
} ?>
<main class="bg-black p-3 text-white-50">
    <form method="post" action="index.php?action=addPost" enctype="multipart/form-data" class="mx-lg-5">
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
            <input value="<?php if(!empty($post)){echo $post->title();}; ?>" type="text" name="title" class="form-control" id ="title" placeholder="Titre" required />
        </div>
        <div class="form-group">
            <label for="chapo">Chapô</label>
            <textarea rows="4" name="chapo" class="form-control" id ="chapo" placeholder="Chapô" required><?php if(!empty($post)){echo $post->chapo();}; ?></textarea>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea rows="5" name="content" class="form-control" id ="content" placeholder="Contenu" required><?php if(!empty($post)){echo $post->content();}; ?></textarea>
        </div>
        <div class="form-group">
            <label for="picture"> Ajouter une photo (.png, .jpg, .jpeg, max 1Mo) :</label>
            <input type="file" name="picture" id="picture" accept="image/png, image/jpeg, image/jpg" />
        </div>
        <button type="submit" class="btn btn-primary">Mettre en ligne</button>
    </form>
</main>
