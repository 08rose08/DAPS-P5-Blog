<?php 
    $this->title = 'Mon Blog : la liste';
    $this->page = 'Le blog-recettes';
?>

<main class="bg-black p-3">
    <?php
    foreach ($posts as $post){
    ?>
        <div class="card bg-light m-3 p-3 d-flex flex-column flex-md-row">
            
                <img src="<?= $post->picture() ?>" class="border rounded mr-md-3" width="200" height="200" alt="photo de la recette">
                <div class="d-flex flex-column">
                    <h2><a href='index.php?action=getOnePost&amp;id=<?= $post->id() ?>'><?= $post->title() ?></a></h2>
                    <p><?= $post->chapo() ?></p>
                    <p><em>Par <?= $post->username() ?> le <?= $post->last_update_date() ?></em></p>
                </div>
            

            
            
        </div>
    <?php } ?>
    <p class="text-center"><?php for ($i = 1 ; $i <= $nbPages ; $i++)  
        {  
            echo '<a href="index.php?action=getPosts&numPage=' . $i . '">' . $i . '</a> ';  
        } ?>
    </p>
</main>
