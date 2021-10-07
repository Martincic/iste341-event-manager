<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row hero">
        <div class="col-md-12">
            <h1>ADMIN - Manager Events</h1>
            <p class="text-center">Scroll down to view and edit your events</p>
        </div>
        <div class="col-md-12 text-center">
        <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" />

        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php 

                foreach ($data as $event) {
                    include(__DIR__.'/../components/single_manager_item.php');
                }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div></div></div>
</div>