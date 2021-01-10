<?php get_template_part( 'head' ); ?>
<?php wpbp_wrap_before(); ?>
    <div id="wrap" role="document">
        <?php wpbp_header_before(); ?>
        <header id="header" role="banner">
            <?php wpbp_header_inside_before(); ?>
            <div class="<?php wpbp_container_class(); ?>">
                <div class="grid_4 medium_grid_4 mobile-center">
                    <?php if ( function_exists( 'of_get_option' ) && of_get_option( 'logo' ) ) : ?>
                        <h1 id="site-title" class="with-logo">
                            <a href="<?php echo home_url(); ?>/">
                                <img id="site-logo" src="<?php echo of_get_option( 'logo' ); ?>" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" />
                            </a>
                        </h1>
                    <?php else : ?>
                        <h1 id="site-title" class="no-logo">
                            <a href="<?php echo home_url(); ?>/">
                                <?php bloginfo( 'name' ); ?>
                                <?php if ( get_bloginfo( 'description' ) ) : ?>
                                    <span id="site-description"><?php bloginfo( 'description' ); ?></span>
                                <?php endif; ?>
                            </a>
                        </h1>
                    <?php endif; ?>
                </div>
                <div class="grid_8 medium_grid_8 text-right mobile-center">
                    <div id="site-search">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <?php wpbp_header_inside_after(); ?>
        </header>
        <?php if ( has_nav_menu( 'primary_navigation' ) ) : ?>
            <nav id="main-nav" role="navigation">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_12">
                        <a class="menu-toggle" href="#menu-primary-navigation"><?php _e( "Menu", 'inform' ); ?></a>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary_navigation' ) ); ?>
                    </div>
                </div>
            </nav>
        <?php endif; ?>
        <?php wpbp_header_after(); ?>
