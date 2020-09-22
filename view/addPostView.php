<?php $title = 'Mon blog : écrire un post'; ?>
<?php $page = 'Nouveau post'; ?>


<?php ob_start(); ?>

<main class="bg-black p-3 text-white-50">
    <form method="post" action="index.php?action=addPost" class="mx-lg-5">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" id ="title" placeholder="Titre" required></input>
        </div>
        <div class="form-group">
            <label for="chapo">Chapô</label>
            <input type="text" name="chapo" class="form-control" id ="chapo" placeholder="Chapô" required></input>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea rows="5" name="content" class="form-control" id ="content" placeholder="Contenu" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre en ligne</button>
    </form>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>