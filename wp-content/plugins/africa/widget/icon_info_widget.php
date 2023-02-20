<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Icon_Info_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'icon_info';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Simple icon info', 'africa' );
	}

	public function get_icon() {
		return 'fa fa-info-circle';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'Castom_category' ];
	}

	public function get_keywords() {
		return [ 'oembed', 'url', 'link' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'icon_info_section',
			[
				'label' => esc_html__( 'Icon info content', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon_info_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'icon_info_editor',
			[
				'label' => esc_html__( 'Description', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'africa' ),
				'placeholder' => esc_html__( 'Type your description here', 'africa' ),
			]
		);

		$this->add_control(
			'flaticon',
			[
				'label' => esc_html__( 'Social Icons', 'plugin-name' ),
				'type' => 'flaticon',
				'include' => [
					'fa fa-500px',
					'fa fa-address-book',
				],
				'default' => 'fa fa-addressbook',
			]
		);
		

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$allow_html = array(
		    'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'strong' => array(),
		    'p'=> array(),
		);
		?>
		 <div class="text-center">
            <span class="<?php if($settings['flaticon']){ echo esc_attr( $settings['flaticon']);} ?> d-block mb-3 display-3 text-secondary"></span>
            <h3 class="text-primary h4 mb-2"><?php if($settings['icon_info_title']){ echo esc_attr( $settings['icon_info_title']);} ?></h3>
            <?php if($settings['icon_info_editor']){ echo wp_kses( $settings['icon_info_editor'], $allow_html);} ?>
          </div>
<?php
	    
	}

}