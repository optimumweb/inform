<?php wpbp_post_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('related-post'); ?>>
    <?php wpbp_post_inside_before(); ?>
    <div class="<?php wpbp_container_class(); ?>">
        <div class="grid_3">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('inform_square'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="grid_9">
            <div class="post-meta">
                <time class="post-date updated" datetime="<?php the_time('c'); ?>" pubdate><?php the_time(__('l, F jS, Y', 'wpbp')); ?></time> |
                <span class="post-author byline author vcard"><?php the_author_posts_link(); ?></span>
            </div>
            <h4 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        </div>
    </div>
    <?php wpbp_post_inside_after(); ?>
</article>
<?php wpbp_post_after(); ?>