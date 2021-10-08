<?php

$date1 = new DateTime($event->datestart);
$date2 = new DateTime($event->dateend);
$duration = $date1->diff($date2)->format("%d days");

$currentAttendees = count($event->attendees());
?>

<div class="swiper-slide">
    <div class="container">

        <!-- NAME -->
        <form action="<?php echo 'edit/' . $event->idevent . '/' . $event->name?>" method="post">
                <div class="row">
                    <div class="col-md-4 pt-2">
                        <div class="h3 pb-4">Name: <?php echo $event->name ?></div>
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="name"><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <!-- DATE START -->
        <form action="<?php echo 'edit/' . $event->idevent . '/' . $event->datestart?>" method="post">
                <div class="row pt-5">
                    <div class="col-md-4 pt-2">
                        <p class=''>Starts on: <?php echo $event->datestart ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="datestart"><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
               

                       <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>                      
                </div>
        </form>
                        
        <!-- DURATION -->
        <form action="<?php echo 'edit/' . $event->idevent . '/' . $event->dateend?>" method="post">
                <div class="row pt-2">
                    <div class="col-md-4 pt-2">
                        <p class=''>Ends on: <?php echo $event->dateend ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="dateend"><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <form action="<?php echo 'edit/' . $event->idevent . '/' . $event->numberAllowed?>" method="post">
                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-4 pt-2">
                        <p class=''>Max number of visitors: <?php echo $currentAttendees . " / " . $event->numberallowed ?></p>    
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="name"><br>
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
                        <a href="manage/<?php echo $event->idevent; //event_id?>"><button type="button" class="btn-blue mt-4"><span class="btn-blue-span">Sessions</span></button></a>
                    </div>  
                
                
                <form action="<?php echo 'delete/' . $event->idevent?>" method="post">
                    <!-- DELETE BTN -->
                    <div class="col-md-6">
                        <button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Delete</span></button>
                    </div>  
                <form>
                </div>
        
        </form>
    </div>
</div>
