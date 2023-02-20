<?php
if (!defined('ABSPATH')) {
	die();
}
class ThemeOptionsSettings {
	function __construct()
	{
	    $this->register();
	}

	static function activation()
	{
		flush_rewrite_rules();
	}

	static function deactivation()
	{
	/*	$profiles = get_posts(array('post_type'=> 'profiles',
									'numberposts'=> -1));
		foreach($profiles as $profil){
			wp_delete_post($profil->ID, true);
		flush_rewrite_rules();
		}*/
	}

	/*static function uninstall(){
		flush_rewrite_rules();
	}*/

	// callback functions fore menu items	

	function global_settings_callback_function()
	{
		echo '<div class="wrap">
			<h1> My settigs</h1>
			
			<form method = "post" action="options.php">';
				settings_fields('General_castom_opt');   // вводим ID секции и содержимое callback функций fields
				do_settings_sections('General_castom_settings'); // вводим слаг menupage / submenupage
				submit_button();
		echo '</form></div>';
	}

	function footer_settings_callback_function()
	{
		echo '<div class="wrap">
			<h1> Footer settigs</h1>
			<hr>
			<form method = "post" action="options.php">';
				settings_fields('Footer_castom_opt');
				do_settings_sections('Footer_castom_options');
				submit_button();
		echo '</form></div>';
	}

	//header fields callback

	function title_fild_callback($args)
	{
		$value = get_option($args['name']);
		printf(
			'<input type="text" id="%s" name="%s" value="%s"/>',
			esc_attr($args['name']),
			esc_attr($args['name']),
			esc_attr($value)
		);
	}


	//footer fields callback

	function footer_settings_text_input_callback($args)
	{
		if (get_option($args['content-name'])) {
			$value = get_option($args['content-name']);
		}else{
			$value = $args['default-link'];
		}
		printf(
			'<input type="text" id="%s" name="%s" value="%s"/>',
			esc_attr($args['content-name']),
			esc_attr($args['content-name']),
			esc_attr($value)
		);
	}

	function footer_settings_text_area_callback($args)
	{
		$value = get_option($args['content-name']);
		printf(
			'<textarea rows="10" cols="45" id="%s" name="%s"> %s </textarea>',
			esc_attr($args['content-name']),
			esc_attr($args['content-name']),
			esc_attr($value)
		);
	}

	function footer_settings_select_callback($args)
	{
		$value = get_option($args['selected-name']);
		$iconList = array(
			'flaticon-facebook' => 'icon-facebook',
			'flaticon-twitter' => 'icon-twitter',
			'flaticon-instagram' => 'icon-instagram',
			'flaticon-linkedin' => 'icon-linkedin'
		);

		?>
		<select  name=" <?php echo $args['selected-name'] ?>" >
		<?php foreach ($iconList as $key => $iconValue) { ?>
			<option value="<?php echo $iconValue; ?>" <?php if ($iconValue === $value) { ?> selected <?php } ?> > 
				<?php echo $key; ?>		
			</option> 
		<?php } ?>	
		</select>
		<?php
		
	}


	

	
	function castom_menu_page_init()
	{	
		// вставляем категорию в меню
		add_menu_page(
			'General castom settings',
			esc_html__('General settings', 'africa'),
			'manage_options',
			'General_castom_settings',
			[$this,'global_settings_callback_function'],
			'dashicons-welcome-widgets-menus',
			10
		);
		
		// Вставка подкатегорий 
		add_submenu_page(
			'General_castom_settings',
			'General_options',
			esc_html__('General options', 'africa'),
			'manage_options',
			'General_castom_settings',
			[$this,'global_settings_callback_function'],
			10
		);

		add_submenu_page(
			'General_castom_settings',
			'Footer_options',
			esc_html__('Footer options','africa'),
			'manage_options',
			'Footer_castom_options',
			[$this,'footer_settings_callback_function'],
			20
		);
			
		
		
		// регистрируем свойства секций
		//footer_settings - название опции которая добавляется с помощью add_settings_field
		
		register_setting('General_castom_opt','site_title_settings','sanitize_text_field'); //подвязываются под id секции
		register_setting('Footer_castom_opt','footer_section_1_header','sanitize_text_field'); 
		register_setting('Footer_castom_opt','footer_section_1_content','sanitize_text_field');
        
        register_setting('Footer_castom_opt','footer_section_2_header','sanitize_text_field'); 


		register_setting('Footer_castom_opt','footer_section_3_header','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_3_content','sanitize_text_field');

		register_setting('Footer_castom_opt','footer_section_4_header','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_4_content','sanitize_text_field');

		register_setting('Footer_castom_opt','footer_section_5_header','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_5_icon1','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_5_link1','sanitize_text_field');

		register_setting('Footer_castom_opt','footer_section_5_icon2','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_5_link2','sanitize_text_field');

		register_setting('Footer_castom_opt','footer_section_5_icon3','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_5_link3','sanitize_text_field');

		register_setting('Footer_castom_opt','footer_section_5_icon4','sanitize_text_field');
		register_setting('Footer_castom_opt','footer_section_5_link4','sanitize_text_field');
		
		
	
		// регистрируем секции	

		add_settings_section('General_settings_section_id','General settings','','General_castom_settings'); //регистрация секции
		add_settings_section('Footer_settings_section_1','Footer settings section 1','','Footer_castom_options'); //регистрация секции
		add_settings_section('Footer_settings_section_2','Footer settings section 2','','Footer_castom_options');
		add_settings_section('Footer_settings_section_3','Footer settings section 3','','Footer_castom_options');
		add_settings_section('Footer_settings_section_4','Footer settings section 4','','Footer_castom_options');
		add_settings_section('Footer_settings_section_5','Footer settings section 5','','Footer_castom_options');
	
		
		//регистрируем поля header

		add_settings_field(
			'site_title_settings',
			esc_html__('Site title','africa'),
			[$this,'title_fild_callback'],
			'General_castom_settings',
			'General_settings_section_id',
			array(
			    'label_for' => 'site_title_settings',
			    'name' => 'site_title_settings'
		    )
		);	
	
		//регистрируем поля footer

		add_settings_field(						// секция 1 заголовок
			'footer_section_1_header',
			esc_html__('Footer section 1-st title','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_1',
			array(
				'label_for' => 'footer_section_1_header',
				//'title-label'   => esc_html__('Footer section 1-st title','africa'), 
			    'content-name' => 'footer_section_1_header',
			    'CSS' => 'content-text-input'
		    )
		);	

		add_settings_field(						// секция 1 контент
			'footer_section_1_content',
			esc_html__('Footer section 1 content','africa'),
			[$this,'footer_settings_text_area_callback'],
			'Footer_castom_options',
			'Footer_settings_section_1',
			array(
				'label_for' => 'footer_section_1_content',
				//'title-label'   => esc_html__('Footer section 1-st content','africa'), 
			    'content-name' => 'footer_section_1_content'
		    )
		);	

		add_settings_field(						// секция 2 заголовок
			'footer_section_2_header',
			esc_html__('Footer section 2-nd title','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_2',
			array(
				'label_for' => 'footer_section_2_header',
				//'title-label'   => esc_html__('Footer section 1-st title','africa'), 
			    'content-name' => 'footer_section_2_header',
			    'CSS' => 'content-text-input'
		    )
		);	

		add_settings_field(						// секция 3 заголовок
			'footer_section_3_header',
			esc_html__('Footer section 3-st title','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_3',
			array(
				'label_for' => 'footer_section_3_header',
				//'title-label'   => esc_html__('Footer section 3-st title','africa'), 
			    'content-name' => 'footer_section_3_header',
			    'CSS' => 'content-text-input'
		    )
		);	

		add_settings_field(						// секция 3 контент
			'footer_section_3_content',
			esc_html__('Footer section 3 content','africa'),
			[$this,'footer_settings_text_area_callback'],
			'Footer_castom_options',
			'Footer_settings_section_3',
			array(
				'label_for' => 'footer_section_3_content',
				//'title-label'   => esc_html__('Footer section 3-st content','africa'), 
			    'content-name' => 'footer_section_3_content'
		    )
		);	
		add_settings_field(						// секция 4 заголовок
			'footer_section_4_header',
			esc_html__('Footer section 4-st title','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_4',
			array(
				'label_for' => 'footer_section_4_header',
				//'title-label'   => esc_html__('Footer section 4-st title','africa'), 
			    'content-name' => 'footer_section_4_header',
			    'CSS' => 'content-text-input'
		    )
		);	

		add_settings_field(						// секция 4 контент
			'footer_section_4_content',
			esc_html__('Footer section 4 content (Shortcode for form.)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_4',
			array(
				'label_for' => 'footer_section_4_content',
				//'title-label'   => esc_html__('Footer section 4-st content','africa'), 
			    'content-name' => 'footer_section_4_content'
		    )
		);	

		add_settings_field(						// секция 5 заголовок
			'footer_section_5_header',
			esc_html__('Footer section 5-st title. (Social contacts)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_header',
				//'title-label'   => esc_html__('Footer section 5-st title','africa'), 
			    'content-name' => 'footer_section_5_header',
			    'CSS' => 'content-text-input'
		    )
		);	

		add_settings_field(						// секция 5 иконка 1
			'footer_section_5_icon1',
			esc_html__('Footer section 5 content. (1-st social icon\'s name.)','africa'),
			[$this,'footer_settings_select_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_icon1',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'selected-name' => 'footer_section_5_icon1'
		    )
		);	
		add_settings_field(						// секция 5 ссылка 1
			'footer_section_5_link1',
			esc_html__('Footer section 5 content. (1-st social link\'s name.)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_link1',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'content-name' => 'footer_section_5_link1',
			    'default-link'  => '#'
		    )
		);	


		add_settings_field(						// секция 5 иконка 2
			'footer_section_5_icon2',
			esc_html__('Footer section 5 content. (2-st social icon\'s name.)','africa'),
			[$this,'footer_settings_select_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_icon2',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'selected-name' => 'footer_section_5_icon2'
		    )
		);
		add_settings_field(						// секция 5 ссылка 2
			'footer_section_5_link2',
			esc_html__('Footer section 5 content. (2-st social link\'s name.)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_link2',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'content-name' => 'footer_section_5_link2',
			    'default-link'  => '#'
		    )
		);	

		add_settings_field(						// секция 5 иконка 3
			'footer_section_5_icon3',
			esc_html__('Footer section 5 content. (3-st social icon\'s name.)','africa'),
			[$this,'footer_settings_select_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_icon3',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'selected-name' => 'footer_section_5_icon3'
		    )
		);
		add_settings_field(						// секция 5 ссылка 3
			'footer_section_5_link3',
			esc_html__('Footer section 5 content. (3-st social link\'s name.)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_link3',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'content-name' => 'footer_section_5_link3',
			    'default-link'  => '#'
		    )
		);	 

		add_settings_field(						// секция 5 иконка 4
			'footer_section_5_icon4',
			esc_html__('Footer section 5 content. (4-st social icon\'s name.)','africa'),
			[$this,'footer_settings_select_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_icon4',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'selected-name' => 'footer_section_5_icon4'
		    )
		);	
		add_settings_field(						// секция 5 ссылка 4
			'footer_section_5_link4',
			esc_html__('Footer section 5 content. (4-st social link\'s name.)','africa'),
			[$this,'footer_settings_text_input_callback'],
			'Footer_castom_options',
			'Footer_settings_section_5',
			array(
				'label_for' => 'footer_section_5_link4',
				//'title-label'   => esc_html__('Footer section 5-st content','africa'), 
			    'content-name' => 'footer_section_5_link4',
			    'default-link'  => '#'
		    )
		);	 

	}

	//adding castom css for admin page

	function load_admin_enqueue_scripts(){
		$my_path_url = plugins_url('assets/css/admin-footer-style.css',__DIR__);
		if($my_path_url){
			wp_enqueue_style('africa-admin-footer-style', $my_path_url); 	
		}		
		
	}
			


	//notice callback

	function sawe_notice()
	{
		if(
			isset($_GET['page'])
			&& 'General_castom_settings' == $_GET['page']
			&& isset($_GET['settings-updated'])
			&& true == $_GET['settings-updated']
		)echo '<div class="notice notice-success is-dismissible"><p> Saving successful!</p> </div>';
		
	}

	function register()
	{
	    add_action('admin_menu',[$this,'castom_menu_page_init']);  
	    add_action('admin_notices',[$this,'sawe_notice']);	
		add_action('admin_enqueue_scripts',[$this,'load_admin_enqueue_scripts']);
	}
}

/*
if (class_exists('ThemeOptionsSettings')) {
	$ThemeOptionsSettings = new ThemeOptionsSettings();
}


register_activation_hook( __FILE__, array($ThemeOptionsSettings, 'activation'));
register_deactivation_hook( __FILE__, array($ThemeOptionsSettings, 'deactivation'));*/
//register_uninstall_hook( __FILE__, array($ThemeOptionsSettings, 'uninstalln'));