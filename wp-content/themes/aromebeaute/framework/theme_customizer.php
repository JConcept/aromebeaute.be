<?php
if( !function_exists('dt_skin_sanitize_callback') ) {
	function dt_skin_sanitize_callback( $input ) {
		$valid = array(
			'blue'=> __('Blue','spalab'),
			'chocolate' => __('Chocolate','spalab'),
			'coral' => __('Coral','spalab'),
			'cyan' => __('Cyan','spalab'),
			'eggplant' => __('Eggplant','spalab'),
			'electricblue' => __('Electric blue','spalab'),
			'ferngreen' => __('fern green','spalab'),
			'gold' => __('Gold','spalab'),
			'green' => __('Green','spalab'),
			'grey' => __('Grey','spalab'),
			'khaki' => __('Khaki','spalab'),
			'ocean' => __('Ocean','spalab'),
			'orange' => __('Orange','spalab'),
			'palebrown' => __('Pale brown','spalab'),
			'pink' => __('Pink','spalab'),
			'purple' => __('Purple','spalab'),
			'raspberry' => __('raspberry','spalab'),
			'red' => __('Red','spalab'),
			'skyblue' => __('Sky blue','spalab'),
			'slateblue' => __('Slate blue','spalab')		
		);
	
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}
	
		return '';		
	}
}

if( !function_exists('dt_layout_sanitize_callback') ) {
	function dt_layout_sanitize_callback( $input ) {
		$valid = array(
			'boxed' => __("Boxed",'spalab'),
			'fullwidth' => __("Full Width",'spalab'),	
		);
	
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}
	
		return '';	
	}
}

if( !function_exists('dt_layout_bg_sanitize_callback') ) {
	function dt_layout_bg_sanitize_callback( $input ) {
		$valid = array(
			'pattern1.jpg' => __("Pattern 1",'spalab'),
			'pattern2.jpg' => __("Pattern 2",'spalab'),
			'pattern3.jpg' => __("Pattern 3",'spalab'),
			'pattern4.jpg' => __("Pattern 4",'spalab'),
			'pattern5.jpg' => __("Pattern 5",'spalab'),
			'pattern6.jpg' => __("Pattern 6",'spalab'),
			'pattern7.jpg' => __("Pattern 7",'spalab'),
			'pattern8.jpg' => __("Pattern 8",'spalab'),
			'pattern9.jpg' => __("Pattern 9",'spalab'),
			'pattern10.jpg' => __("Pattern 10",'spalab'),
			'pattern11.png' => __("Pattern 11",'spalab'),
			'pattern12.png' => __("Pattern 12",'spalab'),
			'pattern13.png' => __("Pattern 13",'spalab'),
			'pattern14.png' => __("Pattern 14",'spalab'),
			'pattern15.png' => __("Pattern 15",'spalab')	
		);
	
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}
	
		return '';	
	}
}

if( !function_exists('sanitize_opacity') ) {
	function sanitize_opacity( $input ) {
		$valid = array( "0" => "0",
			"0.1"=>"0.1",
			"0.2"=>"0.2",
			"0.3"=>"0.3",
			"0.4"=>"0.4",
			"0.5"=>"0.5",
			"0.6"=>"0.6",
			"0.7"=>"0.7",
			"0.8"=>"0.8",
			"0.9"=>"0.9",
			"1"=>"1"					
		);
	
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}
	
		return '';	
	}
}

add_action('customize_register','dt_customizer_register' ); 

if( !function_exists('dt_customizer_register') ) {
	function dt_customizer_register( $wp_customize ) {
		#To remove default sections
		$wp_customize->remove_section("title_tagline");
		$wp_customize->remove_section("colors");
		$wp_customize->remove_section("background_image");
	
		#DesignThemes Customizer
		$wp_customize->add_section("dt_customizer_settings",array(
			'title' => __("DesignThemes' Settings" , "spalab" )
		));
	
		#Skin
			$wp_customize->add_setting("dt_skin", array(
				'default' => dttheme_option('appearance','skin'),
				'transport' => 'postMessage',
				'sanitize_callback' => 'dt_skin_sanitize_callback',
			));
			$wp_customize->add_control("dt_skin", array(
				'section' => "dt_customizer_settings",
				'priority' =>1,
				'label' => __('Choose skin?','spalab'),
				'type' => 'select',
				'choices' => array(
					'blue'=> __('Blue','spalab'),
					'chocolate' => __('Chocolate','spalab'),
					'coral' => __('Coral','spalab'),
					'cyan' => __('Cyan','spalab'),
					'eggplant' => __('Eggplant','spalab'),
					'electricblue' => __('Electric blue','spalab'),
					'ferngreen' => __('fern green','spalab'),
					'gold' => __('Gold','spalab'),
					'green' => __('Green','spalab'),
					'grey' => __('Grey','spalab'),
					'khaki' => __('Khaki','spalab'),
					'ocean' => __('Ocean','spalab'),
					'orange' => __('Orange','spalab'),
					'palebrown' => __('Pale brown','spalab'),
					'pink' => __('Pink','spalab'),
					'purple' => __('Purple','spalab'),
					'raspberry' => __('raspberry','spalab'),
					'red' => __('Red','spalab'),
					'skyblue' => __('Sky blue','spalab'),
					'slateblue' => __('Slate blue','spalab')
				)
			));
		#Skin End
	
		#Layout
			$wp_customize->add_setting("dt_layout", array(
				'default' => dttheme_option('appearance','layout'),
				'transport' => 'postMessage',
				'sanitize_callback' => 'dt_layout_sanitize_callback',
			));
			$wp_customize->add_control("dt_layout", array(
				'section' => "dt_customizer_settings",
				'priority' =>2,
				'label' => __("Choose Layout:","spalab"),
				'type'	=> 'select',
				'choices' => array(
					'boxed' => __("Boxed","spalab"),
					'fullwidth' => __("Full Width","spalab"),
	
				)
			));
	
				#Boxed Layout Pattern
				$wp_customize->add_setting("dt_boxed_layout_bg", array(
					'default' => dttheme_option('appearance','boxed-layout-pattern'),
					'transport' => 'postMessage',
					'sanitize_callback' => 'dt_layout_bg_sanitize_callback'
				));
					
				$wp_customize->add_control("dt_boxed_layout_bg",array(
					'section'=>"dt_customizer_settings",
					'priority' =>3,
					'label' => __("Choose Background Pattern:","spalab"),
					'type'	=> 'select',
					'choices' => array(
						'pattern1.jpg' => __("Pattern 1","spalab"),
						'pattern2.jpg' => __("Pattern 2","spalab"),
						'pattern3.jpg' => __("Pattern 3","spalab"),
						'pattern4.jpg' => __("Pattern 4","spalab"),
						'pattern5.jpg' => __("Pattern 5","spalab"),
						'pattern6.jpg' => __("Pattern 6","spalab"),
						'pattern7.jpg' => __("Pattern 7","spalab"),
						'pattern8.jpg' => __("Pattern 8","spalab"),
						'pattern9.jpg' => __("Pattern 9","spalab"),
						'pattern10.jpg' => __("Pattern 10","spalab"),
						'pattern11.png' => __("Pattern 11","spalab"),
						'pattern12.png' => __("Pattern 12","spalab"),
						'pattern13.png' => __("Pattern 13","spalab"),
						'pattern14.png' => __("Pattern 14","spalab"),
						'pattern15.png' => __("Pattern 15","spalab")
					)
				));
				#Boxed Layout Pattern End
	
				#Boxed Layout Background Color
				$wp_customize->add_setting("dt_boxed_layout_bg_color",array(
					'default' => dttheme_option('appearance','boxed-layout-pattern-color'),
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_hex_color' ));
					
				$wp_customize->add_control( new WP_Customize_Color_Control(
					$wp_customize,
					"dt_boxed_layout_bg_color",
					array( 'label' => __( "Choose Background Color:","spalab"),
							'section' => "dt_customizer_settings",
							'priority' =>4,)
				));
				#Boxed Layout Background Color End
				
				#Boxed Layout BG Opacity
				$wp_customize->add_setting("dt_boxed_layout_bg_opacity", array(
					'default' => dttheme_option('appearance','boxed-layout-pattern-opacity'),
					'transport' => 'postMessage',
					'sanitize_callback' => 'sanitize_opacity'
				));
	
				$wp_customize->add_control("dt_boxed_layout_bg_opacity",array(
					'section' => "dt_customizer_settings",
					'priority' =>5,
					'label' => __("Opacity:","spalab"),
					'type'  => 'select',
					'choices' => array("0",
						"0.1"=>"0.1",
						"0.2"=>"0.2",
						"0.3"=>"0.3",
						"0.4"=>"0.4",
						"0.5"=>"0.5",
						"0.6"=>"0.6",
						"0.7"=>"0.7",
						"0.8"=>"0.8",
						"0.9"=>"0.9",
						"1"=>"1")
				));
				#Boxed Layout BG Opacity End
		#Layout End	
	
	
		#Hidden - Used to update the back end options by calling customize_save_dt-update-backend-options
		# dt-update-backend-options  == customize_save_dt-update-backend-options
			$wp_customize->add_setting("dt-update-backend-options", array(
				'default' => '',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field'
			));
	
			$wp_customize->add_control( 'dt-update-backend-options',array(
				'section' => 'dt_customizer_settings',
				'type' => 'hidden'
			));
		#Hidden End
		#DesignThemes Customizer - End
	} #dt_customizer_register() End 
}

#For Admin
# customize_controls_print_footer_scripts , customize_controls_print_scripts - To add scripts
# customize_controls_print_styles - to add style for customizer 
add_action( 'customize_controls_print_footer_scripts', 'dt_customiser_admin_scripts' );
if( !function_exists('dt_customiser_admin_scripts') ) {
	function dt_customiser_admin_scripts() {
		wp_enqueue_script( 'dt-customizer' , IAMD_FW_URL.'js/admin/admin-customizer.js');
	}
}
add_action('customize_controls_print_styles', 'dt_customiser_admin_style');
if( !function_exists('dt_customiser_admin_style') ) {
	function dt_customiser_admin_style(){
		wp_enqueue_style('dttheme-customizer-css', IAMD_FW_URL.'customizer.css');
	}
}

# For Public
add_action( 'customize_preview_init', 'dt_frontend_customizer_live_preview_js' );
if( !function_exists('dt_frontend_customizer_live_preview_js') ) {
	function dt_frontend_customizer_live_preview_js() {
		wp_enqueue_script( 'dt-customizer' , IAMD_FW_URL.'js/public/customizer.js', array( 'jquery', 'customize-preview' ) , "0.1" , true);
	}
}

add_action( 'customize_save_dt-update-backend-options', 'dt_update_backend_options' );
if( !function_exists('dt_update_backend_options') ) {
	function dt_update_backend_options() {
		$options = get_option(IAMD_THEME_SETTINGS);
		$options['appearance']['skin'] = get_theme_mod('dt_skin');
		$options['appearance']['layout'] = get_theme_mod('dt_layout');
		$options['appearance']['bg-type'] = 'bg-patterns';
		$options['appearance']['boxed-layout-pattern'] = get_theme_mod('dt_boxed_layout_bg');
		$options['appearance']['boxed-layout-pattern-color'] = get_theme_mod('dt_boxed_layout_bg_color');
		$options['appearance']['boxed-layout-pattern-opacity'] = get_theme_mod('dt_boxed_layout_bg_opacity');
	
		update_option( IAMD_THEME_SETTINGS, $options );
	}
}?>