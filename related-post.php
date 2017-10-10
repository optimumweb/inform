<?php wpbp_post_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php wpbp_post_inside_before(); ?>
    <header class="post-header">
        <div class="<?php wpbp_container_class(); ?>">
            <div class="grid_3">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('inform_small'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="grid_9">
                <div class="post-meta">
                    <time class="post-date updated" datetime="<?php the_time('c'); ?>" pubdate><?php the_time(__('l, F jS, Y', 'wpbp')); ?></time> |
                    <span class="post-author byline author vcard"><?php the_author_posts_link(); ?></span>
                </div>
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </div>
    </header>
    <?php wpbp_post_inside_after(); ?>
</article>
<?php wpbp_post_after(); ?>