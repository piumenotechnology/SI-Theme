

<?php

$show_recommended = get_field('show_recommended_content'); 
$recommended_content = get_field('recommended_content');
$add_grey_background = $recommended_content['add_grey_background'];
$recommended_title = $recommended_content['recommended_content_title'];

?>


<?php if($show_recommended) { ?>
<section class="recommended-content
    <?php if($add_grey_background) { ?>
        background-grey
    <?php } ?>
    ">
    <div class="wrapper wrapper-padding">
        <h2><?php echo $recommended_title; ?></h2>
        <div class="recommended-content--inner flex">
            <?php if( have_rows('recommended_content') ): 
                while ( have_rows('recommended_content') ) : the_row(); ?>
            
                    <?php if( have_rows('recommended_content_info') ): 
                        while ( have_rows('recommended_content_info') ) : the_row(); ?>
                    
                            <?php $external_resource = get_sub_field('insert_external_resource'); ?>

                            <?php if($external_resource) { ?>
                                <?php $external_url = get_sub_field('external_resource_url'); 
                                $external_image = get_sub_field('external_resource_image');
                                $external_text = get_sub_field('external_resource_text'); ?>

                                <div class="recommended-content--external recommended-content--piece">
                                    <a href="<?php echo $external_url; ?>" target="_blank">
                                    <div class="external-image obj-fit">
                                        <?php echo wp_get_attachment_image( $external_image["ID"], 'medium'); ?>
                                    </div>
                                    <div class="external-content">
                                        <?php echo $external_text; ?>
                                    </div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <?php $posts = get_sub_field('select_internal_resource'); ?>

                                <?php if($posts) { ?>
                                    <div class="recommended-content--internal recommended-content--piece">
                                        <?php foreach( $posts as $post): ?>
                                        <?php setup_postdata($post); ?>
                                            <div>
                                                <?php get_template_part('partials/resources-post', 'recommended-content'); ?>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php endwhile;
                    endif; ?>
            
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php } ?>



