<?php
    /**
     * The main template file
     */

    get_header();
?>
        <!--Footer Part-1-->
        <div class="container-fluid   footer-1 ">
            <div class="row">
                <div class="col-lg-12 mt-5   ">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to 
                        <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content('Read more...'); ?>
                        <?php comments_template(); ?>
                        </div> <!-- #post-n -->
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
<?php
    get_footer();
?>     