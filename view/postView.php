<?php 
    $this->title = 'Blog : le post';
    $this->page = 'La recette';
?>

<main class="bg-black p-3">
    <div class="card card-body bg-light m-3 p-3">
        <div class="d-flex flex-column">
            <div class="d-flex flex-column flex-md-row">
                <?php
                    if ($_SESSION && $_SESSION['admin'] == 1){
                        include 'buttonsPostAdminView.php';
                        
                    }else{}
                ?> 
                <div class="d-flex flex-column">

                    <h2 class="card-title"><?= $post->title(); ?></h2>
                    <p class="card-subtitle font-italic">Par <?= $post->username() ?> le <?= $post->last_update_date() ?></p>
                    <p class="card-text"><?= $post->chapo() ?></p>
                </div>

            </div>
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start mt-3">
                <img src="<?= $post->picture() ?>" class="border rounded mr-md-3 mt-3" width="200" height="200" alt="photo de la recette">
                <p class="card-text"><?= $post->content() ?></p>
            </div>
        </div>
        <hr class="d-flex flex-column my-4 " />
        <?php include 'commentsView.php'; ?>
    </div>

</main>  
