<?php 
    $this->title = 'Blog : sign up';
    $this->page = 'Sign up';
?>

<main class="bg-black text-white-50 py-5">
    
    <form method="post" action="index.php?action=signup" class="d-flex flex-column align-items-center">
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" name="username" class="form-control" id ="username" placeholder="Name" required></input>
        </div>
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" name="password1" class="form-control" id ="password1" placeholder="password" required></input>
        </div>
        <div class="form-group">
            <label for="password2">Repeat Password</label>
            <input type="password" name="password2" class="form-control" id ="password2" placeholder="password" required></input>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="confidentialite" required>
            <label class="form-check-label text-white" for="confidentialite">I read and agree with the privacy policy.</label>
        </div>
        
        <button type="submit" class="btn btn-primary m-3">Sign up</button>
    </form>

</main>
