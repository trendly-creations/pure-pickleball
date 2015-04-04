<?php sh_custom_header();
$settings  = sh_set( sh_set( get_post_meta(get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$theme_options = get_option( SH_NAME.'_theme_options' );
$sidebar = sh_set( $settings, 'sidebar' );
$position = sh_set( $settings, 'layout' );
$span = ( $sidebar ) ? 'col-md-8' : 'col-md-12';
$icon = sh_set( $settings, 'sh_title_icon' );
$ext = explode( ' ', get_the_title(), 2 );
?>
<section class="block">
			<div class="container">
				<div class="row">
                 <?php if($position == 'left') : ?>
                <aside class="col-md-4">
                	<div class="top-margin">
                    	<?php dynamic_sidebar($sidebar); ?>
                    </div>
                </aside>
                <?php endif; ?>
                <div class="<?php echo $span; ?> column">
					<div class="heading1">
						<h1><strong><?php echo sh_set( $ext, '0' )?></strong> <?php echo sh_set( $ext, '1' )?></h1>
					</div>
                	<div class="post-desc">
                        <?php while( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                 </div>  
                <?php if($position == 'right') : ?>
                <aside class="col-md-4">
                	<div class="top-margin">
                    	<?php dynamic_sidebar($sidebar); ?>
                    </div>
                </aside>
                <?php endif; ?>
		</div>
	</div>
</section>
            
<?php get_footer() ?>