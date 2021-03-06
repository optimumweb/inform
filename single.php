<?php get_header(); ?>

<?php wpbp_post_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
    <?php wpbp_post_inside_before(); ?>
    <header class="post-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-cover">
                <?php the_post_thumbnail( 'inform_cover' ); ?>
            </div>
        <?php endif; ?>
        <div class="<?php wpbp_container_class(); ?>">
            <div class="<?php wpbp_option( 'main_class' ); ?>">
                <h4 class="post-category"><?php echo inform_post_main_category_name(); ?></h4>
                <h1 class="post-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </header>
    <?php wpbp_content_before(); ?>
    <section id="content">
        <?php wpbp_content_after(); ?>
        <div class="<?php wpbp_container_class(); ?>">
            <div class="<?php wpbp_option( 'main_class' ); ?>">
                <?php wpbp_main_before(); ?>
                <section id="main" role="main">
                    <?php wpbp_main_inside_before(); ?>
                    <div class="post-meta">
                        <time class="post-date updated" datetime="<?php the_time( 'c' ); ?>" pubdate>
                            <?php the_time( __( 'l, F jS, Y', 'wpbp' ) ); ?>
                        </time>
                    </div>
                    <section class="post-content">
                        <?php the_content(); ?>
                    </section>
                    <footer class="post-footer">
                        <?php wp_link_pages( array( 'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'wpbp' ), 'after' => '</p></nav>' ) ); ?>
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
            <div class="<?php wpbp_option( 'sidebar_class' ); ?>">
                <?php wpbp_sidebar_before(); ?>
                <aside id="sidebar" role="complementary">
                    <?php wpbp_sidebar_inside_before(); ?>
                    <?php if ( $author_id = get_the_author_meta( 'ID' ) ) : ?>
                        <div class="post-author">
                            <?php if ( $author_avatar = get_avatar( $author_id, 130 ) ) : ?>
                                <div class="post-author-avatar">
                                    <?php echo $author_avatar; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="post-author-name underline"><?php the_author(); ?></h3>
                            <p class="post-author-description">
                                <?php the_author_meta( 'user_description' ); ?>
                            </p>
                            <?php if ( $author_url = get_the_author_meta( 'user_url' ) ) : ?>
                                <div>
                                    <a class="post-author-website-link" href="<?php echo $author_url; ?>" target="_blank">
                                        <?php echo sprintf( __( "Website: %s", 'inform' ), $author_url ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ( $author_posts_url = get_author_posts_url( $author_id ) ) : ?>
                                <div>
                                    <a class="post-author-posts-link" href="<?php echo $author_posts_url; ?>">
                                        <?php echo sprintf( __( "See all posts by %s", 'inform' ), get_the_author_meta( 'display_name' ) ) ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_post_type() === 'post' ) : ?>
                        <div class="related-posts">
                            <h3 class="related-posts-title underline"><?php _e( "Related Articles", 'inform' ); ?></h3>
                            <?php echo do_shortcode( '[wpbp_related_posts post_template="related-post"]' ); ?>
                        </div>
                    <?php endif; ?>
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
