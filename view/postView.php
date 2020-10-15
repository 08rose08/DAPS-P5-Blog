<?php 
    $this->title = 'Blog : le post';
    $this->page = 'La recette';
?>

<main class="bg-black p-3">
    <div class="card card-body bg-light m-3 p-3">
        <div class="d-flex flex-row justify-content-between">
            <div class="d-flex flex-column">

                <h2 class="card-title"><?= htmlspecialchars($post->title()); ?></h2>
                <p class="card-subtitle font-italic">Par <?= htmlspecialchars($post->username()) ?> le <?= htmlspecialchars($post->last_update_date()) ?></p>
                <p class="card-text"><?= htmlspecialchars($post->content()) ?></p>
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
