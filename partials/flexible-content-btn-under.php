<?php 
$FCABU = get_field('flexible_content_area_with_button_under');
$showFCABU = get_field('show_flexible_content_area_with_button_under');
?>

<?php 
// var_dump($showFCABU);
if($showFCABU): ?>
<?php if($FCABU['add_grey_background']): ?>
<section class="flexible-content-area image-left background-grey shadow-section-bottom" id="button-under">
<?php else: ?>
<section class="flexible-content-area image-left shadow-section-bottom " id="button-under">
<?php endif; ?>
    <div class="wrapper-large wrapper-padding">
        <div class="flexible-content-area--inner half">
            <div class="flexible-content-image">
                <div class="pr-60 flexible-content-area--inner-image obj-fit">
                    <img src="<?php echo $FCABU['image']['url']; ?>" alt="<?php echo $FCABU['image']['alt']; ?>" />
                </div>
            </div>
            <div class="pr-100">
                <?php if($FCABU['title']): ?>
                <h2 > <?php echo $FCABU['title']; ?></h2>
                <?php endif; ?>
                <?php if($FCABU['paragraph']): ?>
                    <div class="mb-25"> <?php echo $FCABU['paragraph']; ?></div>
                <?php endif; ?>
            </div> 
        </div>
        <?php if($FCABU['button']): ?>
        <div class="text-center">
            <a href="<?php echo $FCABU['button']['url']; ?>" class="btn-one   mt-50 mb-25"> <?php echo $FCABU['button']['title']; ?></a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php endif; ?> <!-- end of show if -->
