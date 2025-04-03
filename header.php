<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="de">
    <title>ARHITEKTÜR</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.ico" type="image/x-icon">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header -->
    <header class="site-header">

        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" 
                    alt="ARHITEKTÜR" 
                    width="200" 
                    height="50"
                >
            </a>
        </div>

        <!-- Hamburger meni gumb -->
        <button 
            class="menu-toggle" 
            id="menu-toggle" 
            aria-label="Toggle navigation menu"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Glavna navigacija -->
        <nav class="main-nav" aria-label="Main Navigation">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu', 
                    'container'      => false,
                ));
            ?>
        </nav>

    </header>
