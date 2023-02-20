<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Donation_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'donation_info';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Donation info', 'africa' );
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
			'donation_section',
			[
				'label' => esc_html__( 'Donation content', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'donation_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'donation_button_title',
			[
				'label' => esc_html__( 'Button Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type utton title here', 'africa' ),
			]
		);

		$this->add_control(
			'donation_URL',
			[
				'label' => esc_html__( 'URL to donation', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_url(''),
				'placeholder' => esc_url( 'Type URL here', 'africa' ),
			]
		);

		$this->add_control(
			'donation_background_color',
			[
				'label' => esc_html__( 'Background color', 'africa' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-image.overlay:after ' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'donation_background_image',
				[
					'label' => esc_html__( 'Choose Background Image', 'africa' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
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
	
	<div class="site-section bg-image overlay" style="background-image: url('<?php if($settings['donation_background_image']){ echo esc_url( $settings['donation_background_image']['url']);} ?>
	 ');" id="donate-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-5 text-center">
            <h2 class="text-white mb-4"><?php if($settings['donation_title']){ echo esc_attr( $settings['donation_title']);} ?></h2>
            <p>
            	<a href="<?php if($settings['donation_url']){ echo esc_url( $settings['donation_url']);} ?>"
            		class="btn btn-primary px-4 py-3 btn-block">
            	<?php if($settings['donation_button_title']){ echo esc_attr( $settings['donation_button_title']);} ?>
	            </a>
	        </p>
          </div>
        </div>
      </div>
    </div>		


<?php
	    
	}

}