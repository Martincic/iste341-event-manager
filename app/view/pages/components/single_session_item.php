<?php

$date1 = new DateTime($session->startdate);
$date2 = new DateTime($session->enddate);
$duration = $date1->diff($date2)->format("%hh, %imin");

// GET ALL ATTENDEES FOR THIS EVENT
$x = 0;

$currentAttendees = count($session->attendees());
?>

<div class="swiper-slide">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- NAME -->
                <div class="h3 pb-4">Name: <?php echo $session->name ?></div>

                <!-- DATE START -->
                <p class=''>Starts on: <?php echo $session->startdate ?></p>

                <!-- DATE END -->
                <p class=''>Ends on: <?php echo $session->enddate ?></p>

                <!-- DURATION -->
                <p class=''>Duration: <?php echo $duration ?></p>  <!--date start - end -->
            </div>
            <div class="col-md-6">
                <!-- ATTENDEES ALLOWED -->
                <p class='pt-5 mt-3'>Number of visitors attending: <?php echo $currentAttendees . " / " . $session->numberallowed ?></p>    

                <!-- REGISTER BTN -->
                <!-- CHECK IF USER IS ALREADY REGISTERED TO THIS SESSION -->
                
                <a href="<?php echo $data['event']->idevent . '/register/' . $session->idsession?>"><button type="button" class="btn-blue mt-4">
                    <span class="btn-blue-span">
                    <?php if($session->userattending) echo 'Unregister'; else echo 'Register'?>
                    </span>
                    </button></a>
            </div>
        </div>   
    </div>
</div>