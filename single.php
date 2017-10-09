<?php get_header(); ?>

<?php wpbp_post_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php wpbp_post_inside_before(); ?>
    <header class="post-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-cover">
                <?php the_post_thumbnail('inform_cover'); ?>
            </div>
        <?php endif; ?>
        <div class="<?php wpbp_container_class(); ?>">
            <div class="grid_12">
                <h1 class="post-title">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </header>
    <?php wpbp_content_before(); ?>
    <section id="content">
        <?php wpbp_content_after(); ?>
        <div class="<?php wpbp_container_class(); ?>">
            <div class="<?php wpbp_option('main_class'); ?>">
                <?php wpbp_main_before(); ?>
                <section id="main" role="main">
                    <?php wpbp_main_inside_before(); ?>
                    <div class="post-meta">
                        <time class="post-date updated" datetime="<?php the_time('c'); ?>" pubdate><?php printf(__('Posted on %s', 'wpbp'), get_the_time(__('l, F jS, Y', 'wpbp'))); ?></time>
                        <span class="post-author byline author vcard"><?php _e('by', 'wpbp'); ?> <?php the_author_posts_link(); ?></span>
                    </div>
                    <section class="post-content">
                        <?php the_content(); ?>
                    </section>
                    <footer class="post-footer">
                        <?php wp_link_pages(array( 'before' => '<nav id="page-nav"><p>' . __('Pages:', 'wpbp'), 'after' => '</p></nav>' )); ?>
                        <p class="post-tags"><?php the_tags(); ?></p>
                    </footer>
                    <section class="post-comments">
                        <?php comments_template(); ?>
                    </section>
                    <div class="clear"></div>
                    <?php wpbp_main_inside_after(); ?>
                </section>
                <?php wpbp_main_after(); ?>
            </div>
            <div class="<?php wpbp_option('sidebar_class'); ?>">
                <?php wpbp_sidebar_before(); ?>
                <aside id="sidebar" role="complementary">
                    <?php wpbp_sidebar_inside_before(); ?>
                    <?php get_sidebar(); ?>
                    <?php wpbp_sidebar_inside_after(); ?>
                </aside>
                <?php wpbp_sidebar_after(); ?>
            </div>
        </div>
    </section>
    <?php wpbp_post_inside_after(); ?>
</article>
<?php wpbp_post_after(); ?>

<?php get_footer(); ?>
