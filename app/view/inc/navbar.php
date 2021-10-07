
<div class="fixed-top">

<div class="">
<nav>
<ul class="nav mr-auto mt-lg-0">
    <a href="<?php echo BASE_URL ?>/">
        <li class="nav-item">
            <button type="submit" class="nav-link text-light"><span class="nav-span">Home</span></button>
        </li>
    </a>
    <a href="<?php echo BASE_URL ?>/events">
        <li class="nav-item">
        <button type="submit" class="nav-link text-light"><span class="nav-span">Events</span></button>
        </li>
    </a>
    <a href="<?php echo BASE_URL ?>/registrations">
        <li class="nav-item">
        <button type="submit" class="nav-link text-light"><span class="nav-span">Registrations</span></button>
        </li>
    </a>

    <?php 
        if(isset($_SESSION['user']->role) && $_SESSION['user']->role == 'admin') {
            echo `
            <a href="<?php echo BASE_URL ?>/admin">
                <li class="nav-item">
                    <button type="submit" class="nav-link text-light"><span class="nav-span">Admin</span></button>
                </li>
             </a>`;
        } 
    ?>  
   
    <a href="<?php echo BASE_URL ?>/login-form">
        <li class="nav-item">
            <button type="submit" class="nav-link text-light">
                <span class="nav-span">
                    <?php 
                        if(empty($_SESSION)) echo 'Login';
                        else echo 'Log out';
                    ?>
                </span>
            </button>
        </li>
    </a>
    <!-- Display only if there is no user -->
    <?php 
        $url = BASE_URL;
        if(empty($_SESSION)) {
            echo "
            <a href='".$url."/register-form'>
                <li class='nav-item'>
                    <button type='submit' class='nav-link text-light'><span class='nav-span'>Register</span></button>
                </li>
             </a>";
        } 
    ?>  
</ul>
</nav>

</div>
<div class="border-nav"></div>
</div>