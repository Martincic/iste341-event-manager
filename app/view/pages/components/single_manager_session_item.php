<?php

$date1 = new DateTime($session->datestart);
$date2 = new DateTime($session->dateend);
$duration = $date1->diff($date2)->format("%d days");

// $currentAttendees = count($session->attendees());
?>

<div class="swiper-slide">
    <div class="container">
    <form action="welcome.php" method="post">
               
                <div class="row">
                    <div class="col-md-6">
                        <!-- NAME -->
                        <div class="h3 pb-4">Name: <?php echo $session->name ?></div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name"><br>
                    </div>
                </div>
                        
                <div class="row pt-5">
                    <div class="col-md-6">
                        <!-- DATE START -->
                        <p class=''>Starts on: <?php echo $session->datestart ?></p>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="datestart"><br>
                    </div>
                </div>
                        
                        <!-- DURATION -->
                <div class="row">
                    <div class="col-md-6">
                        <p class=''>Ends on: <?php echo $session->dateend ?></p>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="dateend"><br>
                    </div>
                </div>

                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-6">
                <p class=''>Max number of visitors: <?php echo $currentAttendees . " / " . $session->numberallowed ?></p>    
                </div>
                    <div class="col-md-6">
                        <input type="text" name="name"><br>
                    </div>
                </div>

                <!-- EDIT BTN -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="events/<?php echo $session->idsession; //event_id?>"><button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Edit</span></button></a>
                    </div>  
                

                    <!-- DELETE BTN -->
                    <div class="col-md-6">
                        <a href="events/<?php echo $session->idsession; //event_id?>"><button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Delete</span></button></a>
                    </div>  
                </div>
        
        </form>

    </div>
</div>
