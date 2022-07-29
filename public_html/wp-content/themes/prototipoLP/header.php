<?php

    $overflowAuto = '';
    if(isset($_SESSION['sitePreTelaConfirma'])){
        $overflowAuto = 'auto';
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title><?php bloginfo('name'); ?></title>

    <!-- Header wordpress -->
    <?php wp_head(); ?>


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/deps.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/app.min.css">

</head>
<body >
    <header class="header" >
        <div class="container">
            <nav class="navbar navbar-expand-md px-0 justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navmobile">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-principal',
                            'menu_id'        => 'menu-principal',
                            'container'      => false,
                            'depth'          => 2,
                            'menu_class'     => 'navbar-nav menu align-items-lg-center ml-auto',
                            'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
                            'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
                        ) );
                    ?>
                </div>
                <a href="#" data-toggle="modal" data-target="#boxSearch"><i class="fas fa-search"></i></a>
            </nav>
        </div>
    </header>

    <!-- Modal Search -->
    <!-- Modal -->
    <div class="modal fade" id="boxSearch" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="boxSearchLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <?php get_search_form();?>
                </div>
            </div>
        </div>
    </div>

    <main >