    <!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="format-detection" content="telephone=no"/>
        <!-- Favicons to set up later --> 

        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148365752-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-148365752-1');
</script>
        <?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="//varvararozagalleries.com/wp-content/themes/varvara/style-pha-quick-fix.css" media="all">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/fonts/custom-fonts.css">
    </head>

        <body <?php body_class(); ?> style="opacity:0;">
            
            <header class="masthead">
            
                <div class="container-fluid clearfix">

                <a href="/" class="masthead__logo" data-aos="fade-down">

                    <?php if (!is_front_page()) { ?>

                    <img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Varvara logo">

                    <?php } else { ?>

                    <img class="style-svg" src="<?php bloginfo('template_directory'); ?>/img/logo-notext.svg" alt="Varvara logo">
 
                    <?php } ?>

                </a>
                
                <div class="masthead__close" data-aos="fade-down">
                    <div class="masthead__close__img">
                        <span class="span-1"></span>
                        <span class="span-2"></span>
                        <span class="span-3"></span>
                    </div>
                    <div class="masthead__close__text">Menu</div>
                </div>

            </div>

            <div class="menu-overlay">
                <div class="bg-overlay">
                <img src="<?php bloginfo('template_directory'); ?>/img/menulogo.svg" alt="menu logo">
                </div>
                <nav>

                    <?php wp_nav_menu(array ('theme_location' => 'header', 'container' => 'false')); ?>

                </nav>
            </div>

            </header>
