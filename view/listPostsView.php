<?php 
    $this->title = 'Mon Blog : la liste';
    $this->page = 'Le blog-recettes';
?>

<main class="bg-black p-3">
    <?php
    foreach ($posts as $post){
    ?>
        <div class="card bg-light m-3 p-3 d-flex flex-row justify-content-between">
            <div class="d-flex flex-column">
                <h2><a href='index.php?action=getOnePost&amp;id=<?= htmlspecialchars($post->id()) ?>'><?= htmlspecialchars($post->title()) ?></a></h2>
                <p><?= htmlspecialchars($post->chapo()) ?></p>
                <p>Par <?= htmlspecialchars($post->username()) ?> le <?= htmlspecialchars($post->last_update_date()) ?></p>
            </div>

            <?php
                if ($_SESSION && $_SESSION['admin'] == 1){
                    include 'buttonsPostAdminView.php';
                    
                }else{}
            ?> 
            
        </div>
    <?php } ?>
</main>
