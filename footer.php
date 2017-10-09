        <?php wpbp_footer_before(); ?>
        <footer id="footer" role="contentinfo">
            <?php wpbp_footer_inside_before(); ?>
            <?php if ( is_dynamic_sidebar("Footer") ) : ?>
                <div id="footer-widgets">
                    <div class="<?php wpbp_container_class(); ?>">
                        <?php dynamic_sidebar("Footer"); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div id="bottom-bar">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_8 mobile-center">
                        <?php if ( has_nav_menu('secondary_navigation') ) : ?>
                            <nav id="footer-nav">
                                <?php wp_nav_menu(array( 'theme_location' => 'secondary_navigation' )); ?>
                                <div class="clear"></div>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="grid_4 text-right mobile-center">
                        <div id="copy">
                            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
                        </div>
                        <?php if ( function_exists('of_get_option') ) : ?>
                            <div id="social-links">
                                <?php if ( $twitter_url = of_get_option('twitter_url') ) : ?>
                                    <a href="<?php echo $twitter_url; ?>" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ( $facebook_url = of_get_option('facebook_url') ) : ?>
                                    <a href="<?php echo $facebook_url; ?>" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php wpbp_footer_inside_after(); ?>
        </footer>
        <?php wpbp_footer_after(); ?>
    </div>

<?php wp_footer(); ?>
<?php wpbp_footer(); ?>

</body>
</html>
<?php wpbp_after_html(); ?>