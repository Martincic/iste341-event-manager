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


    <div id="tabs2" class="content">
        <ul>
            <li><a href="#tabs2-1">
                <?php
                    if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '2') {
                        echo 'My sessions'; 
                    }else if(isset($_SESSION['user']->role) && $_SESSION['user']->role == '1') {
                        echo 'Sessions'; 
                    }
                ?>
                
            </a></li>
            <li><a href="#tabs2-2">Create new session</a></li>
        </ul>
        <div id="tabs2-1" class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php 
                                if(count($data['sessions']) > 0 ){
                                    foreach ($data['sessions'] as $session) {
                                        include(__DIR__.'/../components/single_manager_session_item.php');
                                    }
                                }else{
                                    echo '<h4 class="text-center pt-4">No sessions found for this event: ' . $data["event"]->name . '</h4>';
                                }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tabs2-2">
        <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php 

                                
                                    include(__DIR__.'/../components/single_create_session_item.php');
                                
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            
        </div>
    </div>




</div>