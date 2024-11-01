<?php
/**
 * Class to create the 'About Us' submenu
 */

if ( !defined( 'ABSPATH' ) )
	exit;

if ( !class_exists( 'ewduaspAboutUs' ) ) {
class ewduaspAboutUs {

	public function __construct() {

		add_action( 'wp_ajax_ewd_uasp_send_feature_suggestion', array( $this, 'send_feature_suggestion' ) );

		add_action( 'admin_menu', array( $this, 'register_menu_screen' ) );
	}

	/**
	 * Adds About Us submenu page
	 * @since 2.2.0
	 */
	public function register_menu_screen() {
		global $ewd_uasp_controller;

		add_submenu_page(
			'ewd-uasp-appointments', 
			esc_html__( 'About Us', 'ultimate-appointment-scheduling' ),
			esc_html__( 'About Us', 'ultimate-appointment-scheduling' ),
			$ewd_uasp_controller->settings->get_setting( 'access-role' ),
			'ewd-uasp-about-us',
			array( $this, 'display_admin_screen' )
		);
	}

	/**
	 * Displays the About Us page
	 * @since 2.2.0
	 */
	public function display_admin_screen() { ?>

		<div class='ewd-uasp-about-us-logo'>
			<img src='<?php echo plugins_url( "../assets/img/ewd_new_logo_purple2.png", __FILE__ ); ?>'>
		</div>

		<div class='ewd-uasp-about-us-tabs'>

			<ul id='ewd-uasp-about-us-tabs-menu'>

				<li class='ewd-uasp-about-us-tab-menu-item ewd-uasp-tab-selected' data-tab='who_we_are'>
					<?php _e( 'Who We Are', 'ultimate-appointment-scheduling' ); ?>
				</li>

				<li class='ewd-uasp-about-us-tab-menu-item' data-tab='lite_vs_premium'>
					<?php _e( 'Lite vs. Premium', 'ultimate-appointment-scheduling' ); ?>
				</li>

				<li class='ewd-uasp-about-us-tab-menu-item' data-tab='getting_started'>
					<?php _e( 'Getting Started', 'ultimate-appointment-scheduling' ); ?>
				</li>

				<li class='ewd-uasp-about-us-tab-menu-item' data-tab='suggest_feature'>
					<?php _e( 'Suggest a Feature', 'ultimate-appointment-scheduling' ); ?>
				</li>

			</ul>

			<div class='ewd-uasp-about-us-tab' data-tab='who_we_are'>

				<p>
					<strong>Founded in 2014, Etoile Web Design is a leading WordPress plugin development company. </strong>
					Privately owned and located in Canada, our growing business is expanding in size and scope. 
					We have more than 50,000 active users across the world, over 2,000,000 total downloads, and our client based is steadily increasing every day. 
					Our reliable WordPress plugins bring a tremendous amount of value to our users by offering them solutions that are designed to be simple to maintain and easy to use. 
					Our plugins, like the <a href='https://www.etoilewebdesign.com/plugins/ultimate-product-catalog/?utm_source=admin_about_us' target='_blank'>Ultimate Product Catalog</a>, <a href='https://www.etoilewebdesign.com/plugins/order-tracking/?utm_source=admin_about_us' target='_blank'>Order Status Tracking</a>, <a href='https://www.etoilewebdesign.com/plugins/ultimate-faq/?utm_source=admin_about_us' target='_blank'>Ultimate FAQs</a> and <a href='https://www.etoilewebdesign.com/plugins/ultimate-reviews/?utm_source=admin_about_us' target='_blank'>Ultimate Reviews</a> are rich in features, highly customizable and responsive. 
					We provide expert support to all of our customers and believe in being a part of their success stories.
				</p>

				<p>
					Our current team consists of web developers, marketing associates, digital designers and product support associates. 
					As a small business, we are able to offer our team flexible work schedules, significant autonomy and a challenging environment where creative people can flourish.
				</p>

			</div>

			<div class='ewd-uasp-about-us-tab ewd-uasp-hidden' data-tab='lite_vs_premium'>

				<p><?php _e( 'The premium version of the plugin comes with additional features that let you customize the form both for your needs and to integrate seamlessly into your website, including extra layouts and styling options as well as the ability to accept payment for bookings, set up reminder notifications and even require login for booking.', 'ultimate-appointment-scheduling' ); ?></p>

				<p><em><?php _e( 'The following table provides a comparison of the lite and premium versions.', 'ultimate-appointment-scheduling' ); ?></em></p>

				<div class='ewd-uasp-about-us-premium-table'>
					<div class='ewd-uasp-about-us-premium-table-head'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Feature', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Lite Version', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Premium Version', 'ultimate-appointment-scheduling' ); ?></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Create unlimited locations, each with unique opening hours', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Create unlimited services that cost different amounts and take different amounts of time', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Dynamic calendar that is automatically updated to avoid double booking', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Optional multi-step booking form', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Automatic email notifications for new appoinmtents', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Set required information, such as name or phone number', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Set minimum and maximum number of days before that an appointment can be booked', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Set amount of time between appointments', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'WooCommerce integration to allow payment for appointments', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Mandatory or optional payments for appoinmtents via PayPal', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Automated reminder emails sent to clients a specified amount of time before their appointments', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Require login to WordPress before being able to create an appointment', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Advanced layout and styling options', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='ewd-uasp-about-us-premium-table-body'>
						<div class='ewd-uasp-about-us-premium-table-cell'><?php _e( 'Advanced labelling options', 'ultimate-appointment-scheduling' ); ?></div>
						<div class='ewd-uasp-about-us-premium-table-cell'></div>
						<div class='ewd-uasp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
				</div>

				<?php printf( __( '<a href="%s" target="_blank" class="ewd-uasp-about-us-tab-button ewd-uasp-about-us-tab-button-purchase">Buy Premium Version</a>', 'ultimate-appointment-scheduling' ), 'https://www.etoilewebdesign.com/license-payment/?Selected=UASP&Quantity=1&utm_source=admin_about_us' ); ?>
				
			</div>

			<div class='ewd-uasp-about-us-tab ewd-uasp-hidden' data-tab='getting_started'>

				<p><?php _e( 'The walk-though that ran when you first activated the plugin offers a quick way to get started with setting it up. If you would like to run through it again, just click the button below.', 'ultimate-appointment-scheduling' ); ?></p>

				<?php printf( __( '<a href="%s" class="ewd-uasp-about-us-tab-button ewd-uasp-about-us-tab-button-walkthrough">Re-Run Walk-Through</a>', 'ultimate-appointment-scheduling' ), admin_url( '?page=ewd-uasp-getting-started' ) ); ?>
				
			</div>

			<div class='ewd-uasp-about-us-tab ewd-uasp-hidden' data-tab='suggest_feature'>

				<div class='ewd-uasp-about-us-feature-suggestion'>

					<p><?php _e( 'You can use the form below to let us know about a feature suggestion you might have.', 'ultimate-appointment-scheduling' ); ?></p>

					<textarea placeholder="<?php _e( 'Please describe your feature idea...', 'ultimate-appointment-scheduling' ); ?>"></textarea>
					
					<br>
					
					<input type="email" name="feature_suggestion_email_address" placeholder="<?php _e( 'Email Address', 'ultimate-appointment-scheduling' ); ?>">
				
				</div>
				
				<div class='ewd-uasp-about-us-tab-button ewd-uasp-about-us-send-feature-suggestion'>Send Feature Suggestion</div>
				
			</div>

		</div>

	<?php }

	/**
	 * Sends the feature suggestions submitted via the About Us page
	 * @since 2.2.0
	 */
	public function send_feature_suggestion() {
		global $ewd_uasp_controller;
		
		if (
			! check_ajax_referer( 'ewd-uasp-admin-js', 'nonce' ) 
			|| 
			! current_user_can( $ewd_uasp_controller->settings->get_setting( 'access-role' ) )
		) {
			ewduaspHelper::admin_nopriv_ajax();
		}

		$headers = 'Content-type: text/html;charset=utf-8' . "\r\n";  
	    $feedback = sanitize_text_field( $_POST['feature_suggestion'] );
		$feedback .= '<br /><br />Email Address: ';
	  	$feedback .=  sanitize_email( $_POST['email_address'] );
	
	  	wp_mail( 'contact@etoilewebdesign.com', 'UASP Feature Suggestion', $feedback, $headers );
	
	  	die();
	} 

}
} // endif;