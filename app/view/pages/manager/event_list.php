<?php include 'app/view/inc/navbar.php';?>
<div class="container">
    <div class="row hero">
        <div class="col-md-12">
            <h1>ALL EVENTS</h1>
            <p class="text-center">Scroll down to view events</p>
        </div>
        <div class="col-md-12 text-center">
        <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" />

        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Venue</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Attendees Allowed</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
    </table>

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