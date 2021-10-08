<div class="container">
    <div class="row hero">
        <div class="col-md-12">
            <h1>ADMIN PAGE</h1>
        </div>
        <div class="col-md-12 text-center">
        <!-- <img src="public/img/fast-forward.png" width="32" height="60" class="downIcon" /> -->

        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">

        </div>
    </div>

    <div id="tabs" class="content">
        <ul>
            <li><a href="#tabs-1">
                <?php
                if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '2') {
                        echo 'My events'; 
                    }else if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '1') {
                        echo 'All events'; 
                    }
                ?>
            </a></li>
            <li><a href="#tabs-2">Create new event</a></li>
            <?php 
                if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '1') {
                    echo '
                        <li><a href="#tabs-3">Create new venue</a></li>
                    ';
                } 
            ?>  
            
        </ul>
        <div id="tabs-1" class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php 
                                if(count($data['events']) > 0 ){
                                    foreach ($data['events'] as $event) {
                                        include(__DIR__.'/../components/single_manager_event_item.php');
                                    }
                                }else{
                                    echo '<h4 class="text-center pt-4">No events found for this manager</h4>';
                                }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tabs-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php 
                                    include(__DIR__.'/../components/single_create_event_item.php');
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '1') {
                echo '
                <div id="tabs-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">';
                                    
                                    include(__DIR__.'/../components/single_create_venue_item.php');
                                    
                                echo '</div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            } 
        ?>  

    </div>
</div>