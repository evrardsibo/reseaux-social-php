<?php include ('partials/header.php') ?>
<div class="main-content">
    <div class="container">
        <h1 class="text-center">Register</h1>
        <?php include ('partials/errors.php')?>
        <form method="post" class="well col-md-6 offset-md-3">
            <div class="form-group">
                <label class="control-label" for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="pseudo">Pseudo:</label>
                <input type="text"  class="form-control" name="pseudo" id="pseudo" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email:</label>
                <input type="email"  class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password:</label>
                <input type="password"  class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="confirmpassword">Confirm Password:</label>
                <input type="password"  class="form-control" name="confirmpassword" id="confirmpassword" required>
            </div>
            <button class="btn btn-primary" name="submit">Register</button>
        </form>
    </div>
</div>
<?php include ('partials/footer.php') ?>
