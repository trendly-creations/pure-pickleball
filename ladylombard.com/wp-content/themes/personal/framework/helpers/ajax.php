<?php
class SH_Ajax
{
	
	function __construct()
	{
		add_action( 'wp_ajax_dictate_ajax_callback', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv_dictate_ajax_callback', array( $this, 'ajax_handler' ) );
	}
	
	function ajax_handler()
	{
		$method = sh_set( $_REQUEST, 'subaction' );
		if( method_exists( $this, $method ) ) $this->$method();
		
		exit;
	}
	
	function sh_contact_form_submit()
	{
		if( !count( $_POST ) ) return;
		_load_class( 'validation', 'helpers', true );
		$t = &$GLOBALS['_sh_base'];
		$settings = get_option(SH_NAME.'_theme_options');
	
		$t->validation->set_rules('name','<strong>'.__('Name', SH_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
		$t->validation->set_rules('email','<strong>'.__('Email', SH_NAME).'</strong>', 'required|valid_email');
		$t->validation->set_rules('subject','<strong>'.__('Subject', SH_NAME).'</strong>', 'required|min_length[5]');
		$t->validation->set_rules('comments','<strong>'.__('Message', SH_NAME).'</strong>', 'required|min_length[5]');
		if( sh_set($settings, 'captcha_status') == 'on')
		{
			if( sh_set( $_POST, 'contact_captcha') !== sh_set( $_SESSION, 'captcha' ) )
			{
				$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', SH_NAME);
			}
		}
		
		$messages = '';
		
		if($t->validation->run() !== FALSE && empty($t->validation->_error_array))
		{
			
			$name = $t->validation->post('name');
			$email = $t->validation->post('email');
			$message = $t->validation->post('contact_message');
			$contact_to = ( sh_set($settings, 'comments') ) ? sh_set($settings, 'contact_email') : get_option('admin_email');
			
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
			wp_mail($contact_to, __('Contact Us Message', SH_NAME), $message, $headers);
			
			$message =  sprintf( __('Thank you <strong>%s</strong> for using our contact form! Your email was successfully sent and we will be in touch with you soon.',SH_NAME), $name);
	
			$messages = '<div class="alert alert-success">
							<p class="title">'.__('SUCCESS! ', SH_NAME).$message.'</p>
						</div>';
								
		}else
		{
			 if( is_array( $t->validation->_error_array ) )
			 {
				 foreach( $t->validation->_error_array as $msg )
				 {
					 $messages .= '<div class="alert alert-info">
										<p class="title">'.__('Error! ', SH_NAME).$msg.'</p>
									</div>';
				 }
			 }
		}
		echo $messages;exit;
		//return $messages;
	}
	
}