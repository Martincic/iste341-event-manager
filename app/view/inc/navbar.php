<!--
    TODO: check permissions of user before handling new page
-->

<div class="fixed-top">

    <div class="bg-dark">
    <nav>
    <ul class="nav mr-auto mt-lg-0">
        <form action="<?php echo BASE_URL ?>/" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Home</button>
            </li>
        </form>
        <form action="<?php echo BASE_URL ?>/allEvents" method="post">
            <li class="nav-item">
            <button type="submit" class="nav-link bg-dark text-light">Events</button>
            </li>
        </form>
        <form action="<?php echo BASE_URL ?>/registrations" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Registrations</button>
            </li>
        </form>
        <form action="<?php echo BASE_URL ?>/admin" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Admin</button>
            </li>
        </form>
    </ul>
    </nav>
    </div>
</div>