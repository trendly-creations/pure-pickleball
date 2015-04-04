<?php
	ob_start();
	$settings = get_option( SH_NAME . '_theme_options' );
?>
<section class="block no-padding">
  <div class="layer">
   <div class="fixed-img" style="background: url(<?php echo sh_set( $settings, 'box_parallax' );?>) no-repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0);"></div>
   <div class="post-author2">
    <div class="container">
     <div class="col-md-3">
      <img src="<?php echo sh_set( $settings, 'author_img' ) ?>" alt="" />
     </div>
     <div class="col-md-9">
      <div class="post-author2-detail">
       <h3><?php echo sh_set( $settings, 'autor_name' );?></h3>
       <p><?php echo sh_set( $settings, 'autor_title' );?></p>
       <?php if( sh_set( $settings, 'contact_btn' ) == 1): ?><a href="<?php echo sah_tpl_page('tpl-contact.php')?>"><i class="fa fa-envelope"></i> <?php _e( 'Contact Me', SH_NAME );?></a><?php endif; ?>
      </div>
      </div>
    </div>
   </div>
  </div>
 </section>
<?php 
	$output = ob_get_contents();
	ob_clean();
?>