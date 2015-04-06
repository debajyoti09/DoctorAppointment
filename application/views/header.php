<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <title><?php echo $title; ?></title>
    <meta name="description" content="doctorbookin">
    <meta name="description" content="doctor booking">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/ApplicationCSS/abhi_style.css'?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/BootstrapCSS/bootstrap.min.css'?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/BootstrapCSS/font-awesome.css'?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/css/ApplicationCSS/animate.min.css'?>">
        
        <script src="<?php echo base_url().'assets/js/ApplicationJS/jquery-1.11.1.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/BootStrapJS/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/ApplicationJS/jquery.easing.1.3.js'?>"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-home">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url().'assets/images/logo-2.png'?>" alt="doctor booking"/></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">For Doctors</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">The Team</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>