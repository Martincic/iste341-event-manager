<?php

$date1 = new DateTime($session->startdate);
$date2 = new DateTime($session->enddate);
$duration = $date1->diff($date2)->format("%d days");

$currentAttendees = count($session->attendees());
?>
<h3 class="text-center">MY SESSIONS</h3>
<div class="swiper-slide">

    <div class="container">
    
        <!-- NAME -->
        <form action="<?php echo "sessions/". $session->idsession . '/editSession' . '/Name'?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="h3 pb-4">Name: <?php echo $session->name ?></div>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="Name" value="<?php echo $session->name ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <!-- DATE START -->
        <form action="<?php echo 'sessions/'. $session->idsession . '/editSession' . '/DateStart'?>" method="post">
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Starts on: <?php echo $session->startdate ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" id="datepicker7"  name="DateStart" value="<?php echo $session->startdate ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
               

                       <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>                      
                </div>
        </form>
                        
        <!-- DURATION -->
        <form action="<?php echo 'sessions/'. $session->idsession . '/editSession' . '/DateEnd'?>" method="post">
                <div class="row pt-2">
                    <div class="col-md-4">
                        <p class=''>Ends on: <?php echo $session->enddate ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" id="datepicker8" name="DateEnd" value="<?php echo $session->enddate ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <form action="<?php echo 'sessions/'. $session->idsession . '/editSession' . '/NumberAllowed'?>" method="post">
                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Max number of visitors: <?php echo $currentAttendees . " / " . $session->numberallowed ?></p>    
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="NumberAllowed" value="<?php echo $session->numberallowed ?>"></input><br>
                    </div>
                    
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>
                <!-- SESSIONS BTN -->
                <div class="row pt-5">
                
                
                <form action="<?php echo 'sessions/'. $session->idsession . '/deleteSession';?>" method="post">
                    <!-- DELETE BTN -->
                    <div class="col-md-6">
                        <button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Delete</span></button>
                    </div>  
                </form>
                </div>
        
        
    </div>
</div>
