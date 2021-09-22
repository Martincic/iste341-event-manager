<!--
    TODO: check permissions of user before handling new page
-->

<div class="fixed-top">

    <div class="bg-dark">
    <nav>
    <ul class="nav mr-auto mt-lg-0">
        <form action="index.php?page=home" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Home</button>
            </li>
        </form>
        <form action="index.php?page=allEvents" method="post">
            <li class="nav-item">
            <button type="submit" class="nav-link bg-dark text-light">Events</button>
            </li>
        </form>
        <form action="index.php?page=registrations" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Registrations</button>
            </li>
        </form>
        <form action="index.php?page=admin" method="post">
            <li class="nav-item">
                <button type="submit" class="nav-link bg-dark text-light">Admin</button>
            </li>
        </form>
    </ul>
    </nav>
    </div>


</div>