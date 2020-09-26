<?php $title = 'The Blog : log in'; ?>
<?php $page = 'Log in'; ?>

<?php ob_start(); ?>

<main class="bg-black text-white-50 py-5">
    
    <form method="post" action="index.php?action=login" class="d-flex flex-column align-items-center">
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" class="form-control" id ="username" placeholder="Name" required></input>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id ="password" placeholder="password" required></input>
        </div>
        
        
        <button type="submit" class="btn btn-primary m-3">Log in</button>
    </form>

</main>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>