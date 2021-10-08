    <div class="container text-center">
        <h3>CREATE SESSION</h3>
        <!-- NAME -->
        <form class="pt-5 createEvents" action="<?php echo BASE_URL ."/manage/$session->event/createSession"?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="h3 pb-3">Name:</div>
                    </div>
                    <div class="col-md-6 pt-2">
                        <input type="text" name="Name" value="<?php if(isset($_POST['Name'])) echo $_POST['Name'] ?>"></input><br>
                        <?php 
                            if(!empty($data['errors']['name'])) {
                                foreach($data['errors']['name'] as $err) {
                                    echo "<p class='small text-danger m-0'>$err</p>";
                                }
                            }
                        ?>
                    </div>
                </div>

        <!-- DATE START -->
      
                <div class="row pt-5">
                    <div class="col-md-6">
                        <p class=''>Starts on:</p>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="DateStart" id="datepicker5" value="<?php if(isset($_POST['DateStart'])) echo $_POST['DateStart'] ?>"></input><br>
                        <?php 
                            if(!empty($data['errors']['dateStart'])) {
                                foreach($data['errors']['dateStart'] as $err) {
                                    echo "<p class='small text-danger m-0'>$err</p>";
                                }
                            }
                        ?>
                    </div>         
                </div>

        <!-- DURATION -->
       
                <div class="row pt-3">
                    <div class="col-md-6">
                        <p class=''>Ends on:</p>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="DateEnd" id="datepicker6" value="<?php if(isset($_POST['DateEnd'])) echo $_POST['DateEnd'] ?>"></input><br>
                        <?php 
                            if(!empty($data['errors']['dateEnd'])) {
                                foreach($data['errors']['dateEnd'] as $err) {
                                    echo "<p class='small text-danger m-0'>$err</p>";
                                }
                            }
                        ?>
                    </div>
                    
                </div>
      

       
                <!-- ATTENDEES ALLOWED -->
                <div class="row pt-5">
                    <div class="col-md-6">
                        <p class=''>Max number of visitors: </p>    
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="NumberAllowed" value="<?php if(isset($_POST['NumberAllowed'])) echo $_POST['NumberAllowed'] ?>"></input><br>
                        <?php 
                            if(!empty($data['errors']['numberAllowed'])) {
                                foreach($data['errors']['numberAllowed'] as $err) {
                                    echo "<p class='small text-danger m-0'>$err</p>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="row text-center pt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn-blue"><span class="btn-blue-span">Create</span></button>
                    </div>  
                </div>
        </form>
        
</div>
