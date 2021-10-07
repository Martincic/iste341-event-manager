<?php

$date1 = new DateTime($session->startdate);
$date2 = new DateTime($session->enddate);
$duration = $date1->diff($date2)->format("%d days");

// GET ALL ATTENDEES FOR THIS EVENT
// $x = 0;
$currentAttendees = count($session->attendees());
?>

<div class="swiper-slide">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- NAME -->
                <div class="h3 pb-4"><?php echo $session->name ?></div>

                <!-- DATE START -->
                <p class=''>Starts on: <?php echo $session->startdate ?></p>

                <!-- DURATION -->
                <p class=''>Duration: <?php echo $duration ?></p>
            </div>
            <div class="col-md-6">
                <!-- ATTENDEES ALLOWED -->
                <p class='pt-5 mt-3'>Number of visitors attending: <?php echo $currentAttendees . " / " . $session->numberallowed ?></p>    

                <!-- REGISTER BTN -->
                <a href="events/<?php echo $session->event . '/register/' . $session->idsession; //event_id?>"><button type="button" class="btn-blue mt-4"><span class="btn-blue-span">Remove</span></button></a>
            </div>
        </div>   
    </div>
</div>
