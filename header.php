<?php get_template_part('head'); ?>
<?php wpbp_wrap_before(); ?>
    <div id="wrap" role="document">
        <?php wpbp_header_before(); ?>
        <header id="header" role="banner">
            <?php wpbp_header_inside_before(); ?>
            <div class="<?php wpbp_container_class(); ?>">
                <div class="grid_4 mobile-center">
                    <h1 id="site-title">
                        <a href="<?php echo home_url(); ?>/">
                            <?php if ( function_exists('of_get_option') && of_get_option('logo') ) : ?>
                                <img id="site-logo" src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif; ?>
                        </a>
                    </h1>
                </div>
                <div class="grid_8 text-right mobile-center">
                    <div id="site-search" class="valign">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <?php wpbp_header_inside_after(); ?>
        </header>
        <?php if ( has_nav_menu('primary_navigation') ) : ?>
            <nav id="main-nav" role="navigation">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_12">
                        <a class="menu-toggle" href="#menu-primary-navigation"><?php _e("Menu", 'inform'); ?></a>
                        <?php wp_nav_menu(array( 'theme_location' => 'primary_navigation' )); ?>
                    </div>
                </div>
            </nav>
        <?php endif; ?>
        <?php wpbp_header_after(); ?>
