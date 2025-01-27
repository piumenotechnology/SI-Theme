<?php 
$FCALI = get_field('flexible_content_area_left_image');
$showFCALI = get_field('show_flexible_content_area_image_left');
?>
<?php if($showFCALI): ?>

<?php if($FCALI['add_grey_background']): ?>
<section class="flexible-content-area image-left background-grey shadow-section-bottom" id="flex-content-img-left">
<?php else: ?>
<section class="flexible-content-area image-left shadow-section-bottom" id="flex-content-img-left">
<?php endif; ?>
    <div class="wrapper-large wrapper-padding">
        <div class="flexible-content-area--inner half">
            <div class="flexible-content-image">
                <div class="lg:pr-32 obj-fit">
                    <img src="<?php echo $FCALI['image']['sizes']['large']; ?>" alt="<?php echo $FCALI['image']['alt']; ?>" class="rounded-lg" />
                </div>
            </div>
            <div class="flexible-content-text pr-100">
                <?php if($FCALI['title']): ?>
                <h2 class="text-2xl mb-2.5"> <?php echo $FCALI['title']; ?></h2>
                <?php endif; ?>
                <?php if($FCALI['paragraph']): ?>
                    <div class="mb-25"> <?php echo $FCALI['paragraph']; ?></div>
                <?php endif; ?>
                <?php if($FCALI['button']): ?>
                    <a href="<?php echo $FCALI['button']['url']; ?>" class="btn-one mb-25 mt-2.5"> <?php echo $FCALI['button']['title']; ?></a>
                <?php endif; ?>
                <?php if($FCALI['additional_text']): ?>
                    <a class="additional-text" href="<?php echo $FCALI['additional_text']['url']; ?>"> <?php echo $FCALI['additional_text']['title']; ?></a>
                <?php endif; ?>
            </div> 
        </div>
    </div>
</section>

<?php endif; ?> <!-- end of show if -->
