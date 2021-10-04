<!--
    TODO: check permissions of user before handling new page
-->

<div class="fixed-top">

    <div class="bg-dark">
    <nav>
    <ul class="nav mr-auto mt-lg-0">
        <a href="<?php echo BASE_URL ?>/">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Home</button>
            </li>
        </a>
        <a href="<?php echo BASE_URL ?>/events">
            <li class="nav-item">
            <button type="submit" class="nav-link bg-dark text-light">Events</button>
            </li>
        </a>
        
        <a href="<?php echo BASE_URL ?>/admin">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Admin</button>
            </li>
        </a>

        
        <a class='float-right' href="<?php echo BASE_URL ?>/login">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Login</button>
            </li>
        </a>
        <a class='float-right' href="<?php echo BASE_URL ?>/register">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Register</button>
            </li>
        </a>
    </ul>
    </nav>
    </div>
</div>