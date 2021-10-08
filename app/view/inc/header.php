<!DOCTYPE html>
<!--
Form copied from: https://www.w3schools.com/howto/howto_css_login_form.asp
-->
<html lang="en">
    <head>
        <title><?php echo TITLE; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?php echo BASE_URL ?>/public/css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    </head>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        //swiper.js
        var swiper = new Swiper('.swiper', {
            direction: 'vertical',
            slidesPerView: 1,
            spaceBetween: 30,
            mousewheel: true,
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
        });

        //tabs
        $( function() {
            $( "#tabs, #tabs2" ).tabs();
        } );

        //datepicker
        $( function() {
            $( "#datepicker, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6, #datepicker7, #datepicker8").datepicker();
        } );
    </script>
    <body> 
    