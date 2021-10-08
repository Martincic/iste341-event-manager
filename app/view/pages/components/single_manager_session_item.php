<?php

$date1 = new DateTime($session->datestart);
$date2 = new DateTime($session->dateend);
$duration = $date1->diff($date2)->format("%d days");

$currentAttendees = count($session->attendees());
?>

<div class="swiper-slide">
    <div class="container">

        <!-- NAME -->
        <form action="<?php echo 'manage/'. $session->idsession . '/editSession' . '/Name'?>" method="post">
                <div class="row">
                    <div class="col-md-4 pt-2">
                        <div class="h3 pb-4">Name: <?php echo $session->name ?></div>
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="Name" value=""></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <!-- DATE START -->
        <form action="<?php echo 'manage/'. $session->idsession . '/editSession' . '/DateStart'?>" method="post">
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Starts on: <?php echo $session->datestart ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="DateStart" value=""></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
               

                       <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>                      
                </div>
        </form>
                        
        <!-- DURATION -->
        <form action="<?php echo 'manage/'. $session->idsession . '/editSession' . '/DateEnd'?>" method="post">
                <div class="row pt-2">
                    <div class="col-md-4">
                        <p class=''>Ends on: <?php echo $session->dateend ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="DateEnd" value=""></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <form action="<?php echo 'manage/'. $session->idsession . '/editSession' . '/NumberAllowed'?>" method="post">
                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Max number of visitors: <?php echo $currentAttendees . " / " . $session->numberallowed ?></p>    
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="NumberAllowed" value=""></input><br>
                    </div>
                    
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>
                <!-- SESSIONS BTN -->
                <div class="row pt-5">
                
                    <div class="col-md-6">
                        <a href="manage/<?php echo $session->idsession . '/sessions';?>"><button type="button" class="btn-blue mt-4"><span class="btn-blue-span">Sessions</span></button></a>
                    </div>  
                
                
                <form action="<?php echo 'manage/'. $session->idsession . '/deleteSession';?>" method="post">
                    <!-- DELETE BTN -->
                    <div class="col-md-6">
                        <button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Delete</span></button>
                    </div>  
                <form>
                </div>
        
        </form>
    </div>
</div>
