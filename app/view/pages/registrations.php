<?php include 'app/view/inc/navbar.php';?>
<div class="container hero">
    <div class="row">
        <div class="col-md-12">
            <h1>REGISTRATIONS</h1>
            <p class="text-center">Scroll down to view your registrations</p>
        </div>
        <div class="col-md-12 text-center">
        <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" />

        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
        <?php 
        if(count($data['events']) > 0){
            echo '
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">';
                foreach ($data['events'] as $event) {
                    include(__DIR__.'/../components/single_registration_item.php');
                }

            echo '</div>
                <div class="swiper-pagination"></div>
            </div>';

        }else{
            echo '
            <p>No registrations found!</p>
            <p>Register for events or sessions using:</p>
            <p><a href=BASE_URL/events>Link to all Events</a></p>';
        }
        ?>
        </div>
    </div>
</div>