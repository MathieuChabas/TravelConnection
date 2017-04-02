<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <span class="title">Tripwlocal</span><br>
                    <span class="subtitle">Explore the less explore with locals</span>
                </a>
                <?php if(is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                ?>
                    <div class="register">
                        <a href="<?php echo get_permalink( get_page_by_path( 'user' ) ) ?>">
                            <?php echo get_avatar( get_current_user_id(), 32 ); ?> <br>
                            <span>Your profile</span>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="register">
                        <a href="<?php echo get_permalink( get_page_by_path( 'login' ) ) ?>">Login</a> /
                        <a href="<?php echo get_permalink( get_page_by_path( 'register' ) ) ?>">Register</a>
                    </div>
                <?php } ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <?php wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'container' => 'ul',
                        'menu_class'=> 'nav navbar-nav'
                ) ); ?>
                <div class="social-links">
                    <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
            </div><!-- /.navbar-collapse -->
    </nav>