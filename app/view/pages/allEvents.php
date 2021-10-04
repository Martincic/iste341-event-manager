<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>ALL EVENTS</h1>
        </div>
    </div>
    
    <ol class="list-group list-group-numbered">
        <?php 

            foreach ($data as $event) {
                include('components/single_event_item.php');
            }
        ?>
    </ol>
</div>