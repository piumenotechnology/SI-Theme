<?php $resources = get_field('post_details'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('resource-post flex flex-col'); ?>>
    <!-- Post Image -->
    <div class="post-image">
        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
            <div class="resource-post-image obj-fit mb-4">
                <?php the_post_thumbnail('resource'); ?>
            </div>
        </a>
    </div>

    <!-- Content Section -->
    <section class="entry-content">
        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
            <!-- Date & Category -->
            <div class="mb-3">
                <span class="text-sm text-gray-500"><?php echo get_the_date('d M Y'); ?></span> ·
                <span class="text-sm">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo esc_html($categories[0]->name);
                    } else {
                        echo 'Uncategorized';
                    }
                    ?>
                </span>
            </div>

            <!-- Title -->
            <h2 class="entry-title text-md font-semibold leading-tight mb-2"><?php the_title(); ?></h2>
        </a>

        <!-- Excerpt -->
        <p class="excerpt text-gray-600 text-sm mb-4"><?php echo get_the_excerpt(); ?></p>

        <!-- Entry Details -->
        <?php if ($resources && $resources['company_logo']): ?>
            <div class="entry-details mt-auto flex items-center">
                <img src="<?php echo $resources['company_logo']['url']; ?>"
                    alt="<?php echo $resources['company_logo']['alt']; ?>"
                    class="rounded-full mr-3" />
                <div class="author-title">
                    <p class="text-sm font-semibold"><?php echo $resources['author'] ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="entry-details mt-auto flex items-center">
                <img src=""
                    alt="No image available"
                    class="rounded-full mr-3" />
                <div class="author-title">
                    <p class="text-sm font-semibold">No Author</p>
                </div>
            </div>
        <?php endif; ?>
    </section>
</article>