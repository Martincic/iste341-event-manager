
    <div class="container text-center">
        <h3 class="pt-5">CREATE VENUE</h3>
        <!-- NAME -->
        <form class="pt-5 createEvents" action="<?php echo BASE_URL ?>/manage/createVenue" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" pb-3"><h4>Name:</h4></div>
                    </div>
                    <div class="col-md-6 pt-2">
                        <input type="text" name="Name" value="<?php if(isset($_POST['Name'])) echo $_POST['Name']?>"></input><br>
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
                        <p class=''><h4>Capacity:</h4></p>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Capacity"  value="<?php if(isset($_POST['Capacity'])) echo $_POST['Capacity']?>"></input><br>
                        <?php 
                            if(!empty($data['errors']['capacity'])) {
                                foreach($data['errors']['capacity'] as $err) {
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
