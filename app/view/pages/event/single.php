<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1>Sessions for <?php print_r($data['event']->name);//->name ?></h1>
        </div>
    </div>
    
    <ol class="list-group list-group-numbered">
        <?php 

            foreach ($data['sessions'] as $session) {
                include(__DIR__.'/../components/single_session_item.php');
            }
        ?>
    </ol>
</div>