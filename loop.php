<?php // If there are no posts to display, such as an empty archive page 
?>

<?php
$cur_cat = get_cat_ID(single_cat_title("", false));
?>
<?php if (! have_posts()) : ?>

    <article id="post-0" class="post error404 not-found">
        <h1 class="entry-title">Not Found</h1>
        <section class="entry-content">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
        </section><!-- .entry-content -->
    </article><!-- #post-0 -->

<?php endif; // end if there are no posts 
?>

<?php // if there are posts, Start the Loop. 
?>
<div class="blog-content">
    <?php
    // vars
    $total = $wp_query->found_posts;
    $totalNum = (int)$total; ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('partials/resources', 'post'); ?>

    <?php endwhile; // End the loop. Whew. 
    ?>
</div>

<?php // load more btn  
?>
<?php if ($totalNum > 9) { ?>
    <div class="blog-btn--container text-center mt-8">
        <button class="btn-one btn--load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" data-category="<?php echo $cur_cat;  ?>">Load More</button>
    </div>
<?php } ?>

<div class="loader-container loader-container-posts text-center mt-50">
    <div class="loader uppercase">
        <p>Loading<span>.</span><span>.</span><span>.</span></p>
    </div>
</div>

<div class="blog-message text-center"></div>