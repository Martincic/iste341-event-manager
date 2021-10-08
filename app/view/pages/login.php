<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>LOG IN</h1>
            <?php 
                if(isset($data['message'])) echo '<h2 class="text-inform">'.$data['message'].'</h2>';
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action='<?php echo BASE_URL ?>/login' method='post' class="login-form">
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>">
                    <?php 
                        if(!empty($data['errors']['username'])) {
                            foreach($data['errors']['username'] as $err) {
                                echo "<p class='small text-danger m-0'>$err</p>";
                            }
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']?>">
                    <?php 
                        if(!empty($data['errors']['password'])) {
                            foreach($data['errors']['password'] as $err) {
                                echo "<p class='small text-danger m-0'>$err</p>";
                            }
                        }
                    ?>
                </div>
                <button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Submit</span></button>
            </form>
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col-md-12">
            <h5>Don't have an account?</h5>
        </div>
    </div>
    <div class="row mt-4 text-center">
        <div class="col-md-12">
            <?php 
            $url = BASE_URL;
            echo "
                <a href='".$url."/register-form'>
                    <button class='btn-blue'><span class='btn-blue-span'>Register</span></button>
                </a>";
            ?>
        </div>
    </div>
</div>
</div>