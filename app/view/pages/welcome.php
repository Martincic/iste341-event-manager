<form class="welcome">
    <h1>WELCOME <?php if(isset($_SESSION['user'])) echo $_SESSION['user']->name ?> </h1>
    <p>To navigate around this website, use URLs as follows:</p>
</form>

