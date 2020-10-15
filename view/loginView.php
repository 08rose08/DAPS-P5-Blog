<?php 
    $this->title = 'Blog : log in';
    $this->page = 'Log in';
?>

<main class="bg-black text-white-50 py-5">
    
    <form method="post" action="index.php?action=login" class="d-flex flex-column align-items-center">
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" class="form-control" id ="username" placeholder="Name" pattern="^[A-Za-z0-9 '-]+$" maxlength="20" required></input>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id ="password" placeholder="password" pattern="^[A-Za-z0-9]+$" maxlength="20" required></input>
        </div>
        
        
        <button type="submit" class="btn btn-primary m-3">Log in</button>
    </form>

</main>
