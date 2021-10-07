<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row allEvents">
        <div class="col-md-12">
            <h1><?php echo $data['message'] ?></h1>
            <p class="text-center">Accident? 
                <a href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                    Click here to undo this action.
                </a>
        </div>
        <div class="col-md-12 text-center">

        </div>
    </div>