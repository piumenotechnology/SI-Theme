<!-- FCAWI Section -->
<?php 
$show_wide_check = get_field('show_flexible_content_area_wide_image_section');
if($show_wide_check == true):
  $FCAWI = get_field('flexible_content_area_wide_image');
  ?>
  <section id="about" class="flexible-content-area shadow-section-bottom wrapper-padding <?php if($FCAWI['add_grey_background']): ?> background-grey" id="wide-image" <?php endif; ?>">
    <div class="wrapper">
          <div class="flexible-content-area--inner half lg-column-reverse">
          <div class="pr-40">
          <div class="">
            <?php if($FCAWI['title']): ?>
                <h2> <?php echo $FCAWI['title']; ?></h2>
            <?php endif; ?>
            <?php if($FCAWI['paragraph']): ?>
                <div class="mb-25"> <?php echo $FCAWI['paragraph']; ?></div>
            <?php endif; ?>
            <?php if($FCAWI['button']): ?>
                <a href="<?php echo $FCAWI['button']['url']; ?>" class="btn-one"> <?php echo $FCAWI['button']['title']; ?></a>
            <?php endif; ?>
                
            </div>
          </div>
          <div class="flexible-content-image">
            <div class="obj-fit">
              <img src="<?php echo $FCAWI['image']['sizes']['large']; ?>" alt="<?php echo $FCAWI['image']['alt']; ?>" />
            </div>
          </div>
          
          </div>
      </div>
  </section>
<?php endif;  // end about section check ?>
