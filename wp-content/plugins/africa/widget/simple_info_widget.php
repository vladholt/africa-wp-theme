<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Simple_Info_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'simple_info';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Simple info', 'africa' );
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
			'content_section',
			[
				'label' => esc_html__( 'Simple info content', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'info_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'info_editor',
			[
				'label' => esc_html__( 'Description', 'africa' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '', 'africa' ),
				'placeholder' => esc_html__( 'Type your description here', 'africa' ),
			]
		);

		$this->add_control(
			'info_color',
			[
				'label' => esc_html__( 'Background color', 'africa' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro-engage' => 'background-color: {{VALUE}}',
				],
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
		<div class="intro-engage" >
		<?php if ($settings['info_title']) { ?> <h2> <?php echo esc_attr__( $settings['info_title']); ?> </h2> <?php } ?>
	    <p><?php echo wp_kses( $settings['info_editor'], $allow_html); ?> </p>
	    </div>
<?php
	    
	}
}