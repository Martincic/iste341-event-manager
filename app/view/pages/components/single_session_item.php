<?php

$date1 = new DateTime($session->startdate);
$date2 = new DateTime($session->enddate);
$duration = $date1->diff($date2)->format('%hh, %imin');

?>
<li class="list-group-item d-flex justify-content-between align-items-start m-3">
    <div class="ms-2 me-auto">
        <div>
            <div class="h2"><?php echo $session->name ?></div>
            <p class='small m-1'>Starts on <?php echo $session->startdate ?></p>
            <p class='small m-1'>Duration: <?php echo $duration ?></p>  <!--date start - end -->
            <p class='small m-1'>Num visitors allowed: <?php echo $session->numberallowed ?></p>    
            <!-- IF CURRENT VISITORS < ALLOWED VISITORS -->
            <a href="sessions"><button type="button" class="btn btn-primary">Register</button></a>
        </div>
    </div>
</li>