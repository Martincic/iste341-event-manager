<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row allEvents">
        <div class="col-md-12">
            <h1>All sessions for event <?php echo $data['event']->name ?></h1>
            <p class="text-center">Scroll down to view events</p>
        </div>
        <div class="col-md-12 text-center">
        <img src="<?php echo BASE_URL ?>/public/img/fast-forward.png" width="32" height="60" class="downIcon" />

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php 

                foreach ($data['sessions'] as $session) {
                    include(__DIR__.'/../components/single_session_item.php');
                }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div></div></div>
</div>