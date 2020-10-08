<?php 
    $this->title = 'Blog : le post';
    $this->page = 'La recette';
?>

<main class="bg-black p-3">
    <div class="card card-body bg-light m-3 p-3">
    <div class="card bg-light m-3 p-3">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-column">

                <h2 class="card-title"><?= $post->title(); ?></h2>
                <p class="card-subtitle font-italic">Par <?= $post->username() ?> le <?= $post->last_update_date() ?></p>
                <p class="card-text"><?= $post->content() ?></p>
            </div>
            <?php
                if ($_SESSION && $_SESSION['admin'] == 1){
                    include 'buttonsPostAdminView.php';
                    
                }else{}
            ?> 

        </div>
        <hr class="d-flex flex-column my-4 " />
        <?php include 'commentsView.php'; ?>
    </div>

</main>  
