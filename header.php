<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width initial-scale=1.0" name="viewport">
    <meta content="The Childress Agency" name="author">
    <meta content="public" http-equiv="cache-control">
    <meta content="private" http-equiv="cache-control">
    
    <title><?php echo get_bloginfo( 'name' ); if(get_bloginfo( 'description' )): echo ' | ' . get_bloginfo( 'description' ); endif; ?></title>

    <?php wp_head(); ?>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    <!--[if gte IE 9]
    <style type='text/css'>
    footer {
    filter: none;
    }
    </style>
    <![endif]-->
</head>
<body>
    <header>
        <nav class="header navbar navbar-expand-lg">
            <div class="container">
                <a href="<?php echo esc_url( home_url() ); ?>" class="class="header__title"" ><h1>Stafford <img class="header__logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/wheel.png" /> <span class="header__title--rotary" >Rotary</span></h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Rotary International</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Member Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">DACdb Login</a></li>
                    </ul>
                    <div class="header__search">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

        </nav>
        <div class="main-menu navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Our Club</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Membership</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Foundation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Rotary</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Get Involved</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">News and Stories</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Calendar</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if( is_front_page() ): ?>
            <div id="home-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
                    <li data-target="#home-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/carousel-1.png);" ><p class="carousel-caption">Mountain View Interactors prepare their tree for the Hope House Festival of Trees</p></div>
                    <div class="carousel-item" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/carousel-1.png);" ><p class="carousel-caption">Mountain View Interactors prepare their tree for the Hope House Festival of Trees</p></div>
                    <div class="carousel-item" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/carousel-1.png);" ><p class="carousel-caption">Mountain View Interactors prepare their tree for the Hope House Festival of Trees</p></div>
                </div>
                <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php endif; ?>
    </header>
