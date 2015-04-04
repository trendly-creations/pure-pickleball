<?php
/* Template Name: Gallery */
get_header();
$meta_setting = get_post_meta(get_the_ID(), 'wpnukes_gallery_settings', true);
?>
<div class="banner" <?php if (sh_set($meta_setting, 'page_banner_image')) echo 'style="background:url(' . sh_set($meta_setting, 'page_banner_image') . ') !important"'; ?>>
    <div class="container">
        <h2><?php echo get_the_title(); ?></h2>
    </div>
</div><!-- /banner -->
<div class="container">
	<div class="row">
		<?php if(sh_set($meta_setting, 'page_layout') == 'col-left' && sh_set($meta_setting, 'page_layout') != '' ):?>
            <div class="span4">
                <?php dynamic_sidebar( sh_set( $meta_setting, 'sidebar') ); ?>
            </div>
        <?php endif;?>
        <div class="<?php echo (sh_set($meta_setting, 'page_layout') == '' || sh_set($meta_setting, 'page_layout') == 'full')? 'span12' : 'span8';?>">
			 <?php fw_gallery_listing();  ?> 
        </div>
		<?php if(sh_set($meta_setting, 'page_layout') == 'col-right' && sh_set($meta_setting, 'page_layout') != '' ):?>
            <div class="span4">
                <?php dynamic_sidebar( sh_set( $meta_setting, 'sidebar') ); ?>
            </div>
        <?php endif;?>
    </div>
</div><!-- /container -->
<?php get_footer(); ?>