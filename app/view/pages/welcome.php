<form class="welcome">
    <h1>WELCOME <?php if(isset($_SESSION['user'])) echo $_SESSION['user']->name ?> </h1>
</form>