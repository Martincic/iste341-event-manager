<?php

$date1 = new DateTime($event->datestart);
$date2 = new DateTime($event->dateend);
$duration = $date1->diff($date2)->format("%d");

// GET ALL ATTENDEES FOR THIS EVENT
$x = 0;

$currentAttendees = $event->numberallowed - $x;
?>

<div class="swiper-slide">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- NAME -->
                <div class="h3 pb-4">Name: <?php echo $event->name ?></div>

                <!-- DATE START -->
                <p class=''>Starts on: <?php echo $event->datestart ?></p>

                <!-- DATE END -->
                <p class=''>Ends on: <?php echo $event->dateend ?></p>

                <!-- DURATION -->
                <p class=''>Duration: <?php echo $duration ?> days</p>  <!--date start - end -->
            </div>
            <div class="col-md-6">
                <!-- ATTENDEES ALLOWED -->
                <p class='pt-5 mt-3'>Number of visitors attending: <?php echo $currentAttendees . " / " . $event->numberallowed ?></p>    

                <!-- REGISTER BTN -->
                <a href="events/<?php echo $event->idevent; //event_id?>"><button type="button" class="btn-blue mt-4"><span class="btn-blue-span">Register</span></button></a>
            </div>
        </div>   
    </div>
</div>
