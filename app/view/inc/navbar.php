
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

    <?php 
        if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
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
            <button type="submit" class="nav-link text-light"><span class="nav-span">Login</span></button>
        </li>
    </a>
    
    <a href="<?php echo BASE_URL ?>/register-form">
        <li class="nav-item">
            <button type="submit" class="nav-link text-light"><span class="nav-span">Register</span></button>
        </li>
    </a>
</ul>
</nav>

</div>
<div class="border-nav"></div>
</div>