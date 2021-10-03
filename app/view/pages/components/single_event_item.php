<li class="list-group-item d-flex justify-content-between align-items-start m-3">
    <div class="ms-2 me-auto">
        <div>
            <div class="h2"><?php echo $event['name'] ?></div>
            <p class='small m-1'>Starts on <?php echo $event['datestart'] ?></p>
            <p class='small m-1'>Duration: <?php echo '//TODO: start - end date (figure this out)' ?> days</p>  <!--date start - end -->
            <p class='small m-1'>Num visitors allowed: <?php echo $event['name'] ?></p>    

            <!-- IF CURRENT VISITORS < ALLOWED VISITORS -->
            <a href='registrations/<?php echo $event['venue']['idvenue']; //event_id?>'><button type="button" class="btn btn-primary">Register</button></a>
        </div>
    </div>
    <p clas='h4'>People coming to event: <span class="badge rounded-pill">//TODO: figure this out</span></p>
</li>
<!-- 
'idevent' => 1,
        'name' => 'Cool event 2000',
        'datestart' => '19/10/2021',
        'dateend' => '31/10/2021',
        'numberallowed' => '1500',
        //venue object
        'venue' => [
            'idvenue' => 5,
            'name' => 'Arena Centar Zagreb',
            'capacity' => 1500,
        ], -->