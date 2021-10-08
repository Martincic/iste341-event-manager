<?php

$date1 = new DateTime($event->datestart);
$date2 = new DateTime($event->dateend);
$duration = $date1->diff($date2)->format("%d days");

$currentAttendees = count($event->attendees());
?>

<div class="swiper-slide">
    <div class="container">

        <!-- NAME -->
        <form action="<?php echo 'manage/'. $event->idevent . '/editEvent' . '/Name';?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="h3 pb-3">Name: <?php echo $event->name ?></div>
                    </div>
                    <div class="col-md-4 pl-5 ml-5 pt-2">
                        <input type="text" name="Name" value="<?php echo $event->name ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1 pt-2">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <!-- DATE START -->
        <form action="<?php echo 'manage/'. $event->idevent . '/editEvent' . '/DateStart';?>" method="post">
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Starts on: <?php echo $event->datestart ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" id="datepicker4" name="DateStart" value="<?php echo $event->datestart ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
               

                       <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>                      
                </div>
        </form>
                        
        <!-- DURATION -->
        <form action="<?php echo 'manage/'. $event->idevent . '/editEvent' . '/DateEnd';?>" method="post">
                <div class="row pt-3">
                    <div class="col-md-4">
                        <p class=''>Ends on: <?php echo $event->dateend ?></p>
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" id="datepicker3" name="DateEnd" value="<?php echo $event->dateend ?>"></input><br>
                    </div>
                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <form action="<?php echo 'manage/'. $event->idevent . '/editEvent' . '/venue';?>" method="post">
                <div class="row pt-4">
                    <div class="col-md-4">
                        <label for="venue">Choose a venue:</label>
                    </div>

                    <div class="col-md-4 pl-5 ml-5">
                        <select class="py-2" name="venue" id="venue">
                            <?php 
                                foreach ($data['venues'] as $venue) {
                                    echo "<option value='$venue->idvenue'";
                                    if($venue->name == $event->venue) echo " selected ";
                                    echo ">$venue->name</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- EDIT BTN -->
                    <div class="col-md-1">
                        <button type="submit" class="btn-blue edit-btn"><span class="btn-blue-span">Edit</span></button>
                    </div>  
                </div>
        </form>

        <form action="<?php echo BASE_URL .'/manage/'. $event->idevent . '/editEvent' . '/NumberAllowed';?>" method="post">
                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-4">
                        <p class=''>Max number of visitors: <?php echo $currentAttendees . " / " . $event->numberallowed ?></p>    
                    </div>
                    <div class="col-md-4 pl-5 ml-5">
                        <input type="text" name="NumberAllowed" value="<?php echo $event->numberallowed ?>"></input><br>
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
                        <a href="manage/<?php echo $event->idevent;?>/sessions"><button type="button" class="btn-blue mt-4"><span class="btn-blue-span">Sessions</span></button></a>
                    </div>  
                
                
                <form action="manage/<?php echo $event->idevent;?>/deleteEvent" method="post">
                    <!-- DELETE BTN -->
                    <div class="col-md-6">
                        <button type="submit" class="btn-blue mt-4"><span class="btn-blue-span">Delete</span></button>
                    </div>  
                </form>
                </div>
        
        
    </div>
</div>
