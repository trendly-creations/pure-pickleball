
<script type="text/javascript"> if( siteurl === undefined ) var siteurl = "<?php echo get_template_directory_uri()?>";</script>
<?php 
	$settings = get_option( SH_NAME.'_theme_options' );
	if( sh_set( $settings, 'show_footer' ) == 1 )
	{
		$footer_bg = sh_set( $settings, 'footer_bg' );
		if( $footer_bg )
		{
			?>
			<footer style="background-image: url(<?php echo $footer_bg?>);background-repeat: no-repeat;background-size: 100% 100%;">
            <?php
		}else{
			echo '<footer>';
		}
			echo '<section class="block no-padding">
					<div class="container">
						<div class="row">';
							dynamic_sidebar('footer-widget');
		echo '			</div>
					</div>
			 	</section>';
		echo '<div class="bottom-line">
					<div class="container">
						<span>'.sh_set( $settings, 'copyright_text' ).'</span>
					</div>
				</div>
		</footer>';
	}
	if( sh_set( $settings, 'footer_analytics' ) != '' )
	{
		echo '<script>'. sh_set( $settings, 'footer_analytics' ).'</script>';
	}
?>
<?php wp_footer() ?>
</div>
</body>
</html>
	