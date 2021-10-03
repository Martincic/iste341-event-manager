<?php include 'app/view/inc/navbar.php';

//Controller will inject this data here
$events = [
    1 => [
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
        ],
    ],
    2 => [
        'idevent' => 2,
        'name' => 'Grupno duvanje marihuane',
        'datestart' => '4/20/2021',
        'dateend' => '4/20/2021',
        'numberallowed' => '1500',
        //venue object
        'venue' => [
            'idvenue' => 2,
            'name' => 'Bundek',
            'capacity' => 42069,
        ],
    ],
    3 => [
        'idevent' => 3,
        'name' => 'Cool event 2000',
        'datestart' => '1/2/2021',
        'dateend' => '3/4/2021',
        'numberallowed' => '1500',
        //venue object
        'venue' => [
            'idvenue' => 1,
            'name' => 'Arena Centar Zagreb',
            'capacity' => 1500,
        ],
    ]
];

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>ALL EVENTS</h1>
        </div>
    </div>
    
    <ol class="list-group list-group-numbered">
        <?php 

            foreach ($events as $event) {
                include('components/single_event_item.php');
            }
        ?>
    </ol>
</div>