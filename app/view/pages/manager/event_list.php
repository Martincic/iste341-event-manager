<div class="container">
    <div class="row hero">
        <div class="col-md-12">
            <h1>ADMIN PAGE</h1>
            <p class="text-center">Scroll down to view events</p>
        </div>
        <div class="col-md-12 text-center">
        <!-- <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" /> -->

        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
<!-- 
    <table class="table text-light">
        <thead class="thead-dark text-light">
            <tr>
            
            <th scope="col">Name</th>
            
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Attendees Allowed</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($data as $event){
                // $venue = (new Venue)->getById($event->venue);
                echo "
                <tr>
                    <td>$event->name</td>
                    
                    <td>$event->datestart</td>
                    <td>$event->dateend</td>
                    <td>$event->numberallowed</td>
                </tr>";
            }
            ?>
        </tbody>
    </table> -->

        </div>
    </div>
    <div class="row content">
        <div class="col-md-12">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php 

                foreach ($data as $event) {
                    include(__DIR__.'/../components/single_manager_event_item.php');
                }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div></div></div>
</div>