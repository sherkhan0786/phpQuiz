<?php include_once 'header.php' ?>

    <div class="col-md-6 mx-auto my-5 bg-light bg-gradient p-3">
    <div class="card my-5 text-center bg-info">
        <div class="card-body">
            USER LOGIN
        </div>
    </div>
    <form method="post" action="signinHelper.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="d-grid gap-2 pb-5">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="SIGNIN">
        </div>
   </form>
   <p>Don't have a account <a href="signup.php">click here</a></p>
    </div>

<?php include_once 'footer.php' ?>