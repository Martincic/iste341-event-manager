<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row hero">
        <div class="col-md-12">
            <h1>REGISTRATIONS</h1>
            <!-- IF THERE ARE ANY REGISTRATIONS FOR THIS USER -->
            <p class="text-center">Scroll down to view your registrations</p>
            <!-- ENDIF -->
        </div>
        <div class="col-md-12 text-center">
        <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" />

        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
            <!-- IF THERE ARE ANY REGISTRATIONS FOR THIS USER -> SHOW LIST -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php 

                        foreach ($data as $event) {
                            include(__DIR__.'/../components/single_event_item.php');
                        }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- ELSE -->
            <!-- <p>Register for events or sessions using:</p>
            <p><a href="<?#php echo BASE_URL ?>/events">>Link to allEvents.php</a></p> -->

        </div>
    </div>
</div>