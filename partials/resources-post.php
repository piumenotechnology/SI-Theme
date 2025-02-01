<?php
$resources = get_field('post_details');
<<<<<<< HEAD
// $author_avatar = $resources['company_logo']['url'] ? $resources['company_logo']['url'] : get_template_directory_uri() . '/assets/icons/si_logo.jpg';
$author_avatar = (is_array($resources) && isset($resources['company_logo']['url']) && $resources['company_logo']['url'])
    ? $resources['company_logo']['url']
    : get_template_directory_uri() . '/assets/icons/si_logo.jpg';

=======
$author_avatar = $resources['company_logo']['url'] ? $resources['company_logo']['url'] : get_template_directory_uri().'/assets/icons/si_logo.jpg';
>>>>>>> a7d1614533894685085d7fe2f0fdf4a4dbdf6ee7
$categories = get_the_category();
$cat_icon = get_field('category_icon', 'term_' . $categories[0]->term_id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('resource-post group'); ?>>
<<<<<<< HEAD

    <div class="post-image relative">
        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">

            <?php if (!empty($categories)): ?>
                <p class="post-badge"><?= $categories[0]->name; ?>
                    <image class="style-svg h-3 w-auto ml-2" src="<?= $cat_icon; ?>">
                </p>
            <?php endif; ?>
            <div class="resource-post-image obj-fit">
                <?php the_post_thumbnail('resource'); ?>
            </div>
        </a>
    </div>

    <section class="entry-content">
        <a class="detail-wrapper" href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
            <p class="date-post"><?= get_the_date('d M Y');; ?></p>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php echo '<p class="excerpt">' . get_the_excerpt() . '</p>' ?>
            <?php if ($resources): ?>
=======
    
        <div class="post-image relative">
            <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
                
                <?php if (!empty($categories)): ?>
                    <p class="post-badge"><?= $categories[0]->name; ?>
                        <image class="style-svg h-3 w-auto ml-2" src="<?= $cat_icon; ?>">
                    </p>
                <?php endif; ?>
                <div class="resource-post-image obj-fit">
                    <?php the_post_thumbnail('resource'); ?>
                </div> 
            </a>
        </div>
    
        <section class="entry-content">
            <a class="detail-wrapper" href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
                <p class="date-post"><?= get_the_date('d M Y'); ?></p>
                <h2 class="entry-title"><?php the_title(); ?></h2>
                <?php echo '<p class="excerpt">' . get_the_excerpt() . '</p>' ?>
                <?php if( $resources): ?>
>>>>>>> a7d1614533894685085d7fe2f0fdf4a4dbdf6ee7
                <div class="entry-details !mt-3">
                    <!-- <img src="<?php echo $author_avatar; ?>" alt="<?php echo $resources['company_logo']['alt']; ?>" /> -->
                    <img src="<?php echo esc_url($author_avatar); ?>"
                        alt="<?php echo (is_array($resources) && isset($resources['company_logo']['alt'])) ? esc_attr($resources['company_logo']['alt']) : 'Default Alt Text'; ?>" />

                    <div class="author-title">
                        <p class="font-medium"><?= $resources['author'] ? $resources['author'] : 'Strategy Institute'; ?></p>
                        <p class="text-neutral-500"><?php echo $resources['job_title']; ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </a>
    </section><!-- .entry-content -->

</article><!-- #post-## -->