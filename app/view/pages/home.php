<!--
    // neki home nakon logina?
        - welcome, {user} message
        - simple navigacija na ostale stranice
-->

<form>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>HOMEPAGE</h1>
            <?php 
            //TODO: implement the code to render this page content
            //NOTE: the $data variable is available in this context.
            
            if(isset($data['errors'])) { 
                foreach($data['errors'] as $error) {
                    echo '<p>' . $error . '</p>';
                }   
            } else {
                echo '<p>';
                    echo 'Username: '. $data['username'] . '<br><br>';
                    echo 'Password: ' . $data['pin'];
                echo '<p>';
            }
        ?>
        </div>
    </div>
</div>
</form>