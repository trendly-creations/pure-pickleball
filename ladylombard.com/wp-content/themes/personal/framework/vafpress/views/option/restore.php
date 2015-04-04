<div class="vp-field">
	<div class="label">
		<label>
			<?php _e('Import Dummy Data', SH_NAME) ?>
		</label>
		<div class="description">
			<p><?php _e('Demo settings will import "dummy data XML", "theme options", "widgets", "layerslider slider", "revolution slider" and "visual composer templates"', SH_NAME) ?></p>
		</div>
	</div>
	<div class="field">
		<div class="input">
			<div id="one_click" class="buttons">
				<a id="install_button" class="sh_demo_settings_import vp-button button button-primary" href="javascript:void(0);" >
				<?php _e('Import Demo Settings', SH_NAME) ?>
                </a>
				<p><?php _e('** Please make sure you have already make a backup data of your current settings. Once you click this button, your current settings will be gone', SH_NAME); ?></p>
				
			</div>
		</div>
	</div>
</div>

<div class="overlay"></div>
<div class="importer_result">
 <span>X</span>
    <h1><?php _e('Import Results', SH_NAME)?></h1>
    <div class="result">
    </div>
</div>


<script type="text/javascript">
	jQuery(document).ready(function($){
	 $('#install_button').on('click', function() {
		var check = confirm("Are you sure installing demo data?  Please be aware that the demo data comprises a significant amount of content, and we suggest this demo data be installed in a local host ( ie home or work computer using wamp or mamp ) not in the online site.");
		if (check == false) {
			return false;
		}
		if (jQuery(this).hasClass('is_disabled')) {
			return false;
		}
		jQuery('#install_button').addClass('is_disabled');
		var loading = $('<img src="<?php echo SH_URL .'images/loader.gif '?>" />').insertAfter('#install_button');
		$.post(ajaxurl, {
				action: 'theme-install-demo-data',
			},
			function(response) {
				jQuery('.importer_result .result').html('').hide();
				var height = jQuery('html').height();
				jQuery('.overlay').css({
					'background': 'rgba(0,0,0,0.65)',
					'position': 'fixed',
					'top': '0',
					'left': '0',
					'width': '100%',
					'height': '100%',
					'z-index': '9999999',
				});
				jQuery('.overlay').fadeIn(500, 'swing');
				jQuery('.importer_result').fadeIn(500, 'swing');
				jQuery('.importer_result .result').append(response);
				jQuery('.importer_result .result').fadeIn(500, 'swing');
				loading.remove();
				var done = jQuery('<span class="theme-install-done">Done!</span>').insertAfter('.left_side');
				setTimeout(function() {
					jQuery(done).fadeOut(500, 'swing');
				}, 5000);
			});
	
		return false;
	});
	
	jQuery('.importer_result span').click(function() {
			jQuery('.result').fadeOut(500, 'swing');
			jQuery('.importer_result').fadeOut(500, 'swing');
			jQuery('.overlay').fadeOut(500, 'swing');
			jQuery('#install_button').removeClass('is_disabled');
		});
	});
</script>
