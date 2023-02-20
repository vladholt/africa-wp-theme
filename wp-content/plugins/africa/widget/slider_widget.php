<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_slider_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'slider';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'slider', 'africa' );
	}

	public function get_icon() {
		return ' ';
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
			'content_section',
			[
				'label' => esc_html__( 'Slider content', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
//repiter
//ADD widget element

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'africa' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'africa' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);




		//ADD widget element
/*
		$this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'africa' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
*/

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Slider', 'africa' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Image #1', 'africa' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'africa' ),
					],
					[
						'list_title' => esc_html__( 'Image #2', 'africa' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'africa' ),
					],
				],
				'title_field' => esc_attr__('Slider Item','africa'),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		if (is_admin())
			{
				if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
				    return;
				}
			    echo "<script>$('.owl-carousel').owlCarousel();</script>";
			}

		$settings = $this->get_settings_for_display();
		 if(!empty($settings['list'])){
		 	echo '<div class="owl-carousel slide-one-item">'; 
				foreach($settings['list'] as $item){	
			    echo ' <a href="#"><img src="'. $item['image']['url'] . '" alt="Image" class="img-fluid"></a>';
		    }
		    echo '</div>';
	     }
	     
	    
	}

}