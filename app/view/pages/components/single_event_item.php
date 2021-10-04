<?php

$date1 = new DateTime($event->datestart);
$date2 = new DateTime($event->dateend);
$duration = $date1->diff($date2)->format("%d");

?>
<li class="list-group-item d-flex justify-content-between align-items-start m-3">
    <div class="ms-2 me-auto">
        <div>
            <div class="h2"><?php echo $event->name ?></div>
            <p class='small m-1'>Starts on <?php echo $event->datestart ?></p>
            <p class='small m-1'>Duration: <?php echo $duration ?> days</p>  <!--date start - end -->
            <p class='small m-1'>Num visitors allowed: <?php echo $event->numberallowed ?></p>    
            <!-- IF CURRENT VISITORS < ALLOWED VISITORS -->
            <a href="events/<?php echo $event->idevent;?>"><button type="button" class="btn btn-primary">Register</button></a>
        </div>
    </div>
    <p clas='h4'>People coming to event: <span class="badge rounded-pill">//TODO: figure this out</span></p>
</li>