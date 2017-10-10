<?php wpbp_post_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('related-post'); ?>>
    <?php wpbp_post_inside_before(); ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('inform_square'); ?>
            </a>
        </div>
    <?php endif; ?>
    <h4 class="post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <div class="clear"></div>
    <?php wpbp_post_inside_after(); ?>
</article>
<?php wpbp_post_after(); ?>