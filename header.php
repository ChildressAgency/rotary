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
        <nav class="header navbar navbar-expand-sm">
            <div class="container-fluid">
                <a href="<?php echo esc_url( home_url() ); ?>" class="header__title" ><h1>Stafford <img class="header__logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/wheel.png" /> <span class="header__title--rotary" >Rotary</span></h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Rotary International</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">District 7610</a></li>
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
        <div class="main-menu navbar navbar-expand-md">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="main-menu">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location'    =>  'main_menu',
                        'menu_class'        =>  'navbar-nav',
                        'walker'            =>  new Custom_Nav_Walker()
                    ) ); ?>
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
        <?php elseif( is_archive() ): ?>
            
        <?php else: ?>
            <?php if( get_field( 'hero_image' ) ): ?>
                <div class="hero" style="background-image: url(<?php the_field( 'hero_image' ); ?>">
                    <div class="dark-overlay"></div>
                    <h1><?php if( get_field( 'hero_text' ) ) { the_field( 'hero_text' ); } else { the_title(); } ?></h1>
                </div>
            <?php endif; ?>

            <?php if( get_field( 'page_heading' ) ): ?>
                <div class="container">
                    <div class="section">
                        <div class="page-heading">
                            <img src="http://dev.childressagency.com/rotary/wp-content/uploads/2018/10/wheel.png" alt="logo" class="page-heading__logo">
                            <div class="page-heading__heading">
                                <h2 class="page-heading__title"><?php the_field( 'page_heading' ); ?></h2>
                                <h3 class="page-heading__subtitle"><?php the_field( 'page_subheading' ); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </header>
