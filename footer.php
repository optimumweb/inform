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
                    <div class="grid_6 mobile-center">
                        <?php if ( has_nav_menu('secondary_navigation') ) : ?>
                            <nav id="footer-nav">
                                <?php wp_nav_menu(array( 'theme_location' => 'secondary_navigation' )); ?>
                                <div class="clear"></div>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="grid_3 text-right mobile-center">
                        <div id="copy">
                            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
                        </div>
                    </div>
                    <div class="grid_3 text-right mobile-center">
                        <?php if ( function_exists('of_get_option') ) : ?>
                            <ul class="social-links">
                                <?php if ( of_get_option('twitter_url') ) : ?>
                                    <li>
                                        <a href="<?php echo of_get_option('twitter_url'); ?>" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( of_get_option('facebook_url') ) : ?>
                                    <li>
                                        <a href="<?php echo of_get_option('facebook_url'); ?>" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
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