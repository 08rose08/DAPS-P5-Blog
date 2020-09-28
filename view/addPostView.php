<?php 
    $this->title = 'Blog : écrire un post';
    $this->page = 'Nouveau post';
?>


<?php 
if (!empty($message)){
    echo $message;
} ?>
<main class="bg-black p-3 text-white-50">
    <form method="post" action="index.php?action=addPost" class="mx-lg-5">
        <div class="form-group">
            <label for="title">Titre</label>
            <input value="<?php if(!empty($post)){echo $post->title();}; ?>" type="text" name="title" class="form-control" id ="title" placeholder="Titre" required></input>
        </div>
        <div class="form-group">
            <label for="chapo">Chapô</label>
            <input value="<?php if(!empty($post)){echo $post->chapo();}; ?>" type="text" name="chapo" class="form-control" id ="chapo" placeholder="Chapô" required></input>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea value="<?php if(!empty($post)){echo $post->content();}; ?>" rows="5" name="content" class="form-control" id ="content" placeholder="Contenu" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre en ligne</button>
    </form>
</main>
