<?php 
$FCA = get_field('flexible_content_area');
$showFCA = get_field('show_flexible_contact_area');
?>

<?php if($showFCA): ?>
<?php if($FCA['add_grey_background']): ?>
<section class="flexible-content-area background-grey shadow-section-bottom" id="FCA">
<?php else: ?>
<section class="flexible-content-area shadow-section-bottom" id="FCA">
<?php endif; ?>
    <div class="wrapper wrapper-padding">
        <div class="flexible-content-area--inner half lg-column-reverse">
        <div class="pr-60">
        <?php if($FCA['title']): ?>
            <h2> <?php echo $FCA['title']; ?></h2>
        <?php endif; ?>
        <?php if($FCA['paragraph']): ?>
            <div class="mb-25"> <?php echo $FCA['paragraph']; ?></div>
        <?php endif; ?>
        <?php if($FCA['button']): ?>
            <a href="<?php echo $FCA['button']['url']; ?>" class="btn-one"> <?php echo $FCA['button']['title']; ?></a>
        <?php endif; ?>
            
        </div>
        <div class="flexible-content-image">
            <div class="obj-fit">
                <img src="<?php echo $FCA['image']['sizes']['large']; ?>" alt="<?php echo $FCA['image']['alt']; ?>" />
            </div>
        </div>
        
        </div>
    </div>
</section>
<?php endif; ?>