<?php /* Template Name: Contact Us */
sh_custom_header();
$settings  = sh_set( sh_set( get_post_meta(get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$theme_options = get_option( SH_NAME.'_theme_options' );
$sidebar = sh_set( $settings, 'sidebar' );
$position = sh_set( $settings, 'layout' );
$span = ( $sidebar ) ? 'col-md-8' : 'col-md-12';
$title = explode( ' ', get_the_title(), 2 );
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
                <div class="contact-form">
                <?php if( sh_set( $settings, 'contact_show_heading' ) == 1 ): ?>
                    <div class="heading1">
                        <h1><i class="fa fa-pencil"></i> <strong><?php echo sh_set( $title, '0' ) ?></strong> <?php echo sh_set( $title, '1' ) ?> </h1>
                    </div>
               <?php endif; ?>
                    <div id="contact">
                        <div id="msgs2"></div>
                        <form name="contactform" id="contactform" action="<?php echo admin_url('admin-ajax.php?action=dictate_ajax_callback&amp;subaction=sh_contact_form_submit');?>" method="post">	
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="name" type="text" id="names" class="input-style" placeholder="<?php _e( 'Your Name', SH_NAME) ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input name="email" type="text" id="emails" class="input-style" placeholder="<?php _e( 'Your Email', SH_NAME) ?>" />
                                </div>
                                <div class="col-md-12">
                                    <input class="input-style" name="subjects" id="subjects" type="text" placeholder="Subject" />
                                </div>
                                <div class="col-md-12">
                                    <textarea name="comments" id="commentss" class="input-style" placeholder="<?php _e( 'Your Comment', SH_NAME) ?>"></textarea>
                                    <button type="submit" class="submit" id="submit"><i class="fa fa-envelope"></i> <?php _e( 'SEND', SH_NAME) ?></button>
                                </div>
                            </div>
                            <div id="admn_url" style="display:none"><?php echo get_template_directory_uri();?></div>
                        </form>
                    </div>
                </div><!-- Contact Form -->
            </div>
            
            <script>
				jQuery(document).ready(function($) {
					
					$('#contactform').submit(function(){
						var url = document.getElementById('admn_url').innerHTML;
						var action = $(this).attr('action');
						$("#msgs2").slideUp(750,function() {
						$('#msgs2').hide();
						$('#submit')
							.after('<img class="loader" src='+url+'/images/ajax-loader.gif  />').attr("disabled","disabled");
				
						$.post(action, {
							name: $('#names').val(),
							email: $('#emails').val(),
							comments: $('#commentss').val(),
							subject: $('#subjects').val(),
						},
							function(data){
								document.getElementById('msgs2').innerHTML = data;
								$('#msgs2').slideDown('slow');
								$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
								$('#submit').removeAttr('disabled');
								if(data.match('success') != null) $('#contactform').slideUp('slow');
				
							}
						);
						});
						return false;
					});
							
				
				});
			</script>
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