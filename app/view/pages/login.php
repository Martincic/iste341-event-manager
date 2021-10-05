<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>LOG IN</h1>
            
            <?php 
                if(isset($data['errors'])) {
                    foreach ($data['errors'] as $err) {
                        echo "<h3 class='text-warning'>";
                        echo $err;
                        echo "</h3>";
                    }
                }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action='<?php echo BASE_URL ?>/login' method='post' class="login-form">
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']?>">
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>