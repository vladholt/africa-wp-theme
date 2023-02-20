<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_our_mission_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'our_mission';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Our mission', 'africa' );
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
				'label' => esc_html__( 'Mission content & background', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
//repiter
//ADD widget element

		$this->add_control(
			'mission_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'mission_editor',
			[
				'label' => esc_html__( 'Description', 'africa' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '', 'africa' ),
				'placeholder' => esc_html__( 'Type your description here', 'africa' ),
			]
		);

		$this->add_control(
			'mission_background_color',
			[
				'label' => esc_html__( 'Background mask color', 'africa' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-image.overlay:after' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Choose Background Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


	
		$this->end_controls_section();

// open new section video data



		
		$this->start_controls_section(
			'content_video_section',
			[
				'label' => esc_html__( 'Video data', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'mission_video_preview',
			[
				'label' => esc_html__( 'Video Preview Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'mission_video_link',
			[
				'label' => esc_html__( 'Video link', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_url( 'https://vimeo.com/45830194' ),
				'placeholder' => esc_url( 'https://vimeo.com/45830194'),
			]
		);

		$this->end_controls_section();

//open new section counter

		$counter_repeater = new \Elementor\Repeater();


		$this->start_controls_section(
			'conter_section',
			[
				'label' => esc_html__( 'Counter data', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$counter_repeater->add_control(
			'counter_number',
			[
				'label' => esc_html__( 'Counter number', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0',
				'placeholder' => esc_attr__( 'Type your namber here.','africa'),
			]
		);

		$counter_repeater->add_control(
			'counter_title',
			[
				'label' => esc_html__( 'Counter title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_attr__( 'Type your title here.', 'africa'),
			]
		);


		$this->add_control(
			'counter_list',
			[
				'label' => esc_html__( 'Counter', 'africa' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $counter_repeater->get_controls(),
				'default' => [
					[
						'counter_number' => '',
						'counter_title' => '',
					],
				],
				'title_field' => esc_attr__('Counter Item','africa'),
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
		    'p'=> array(
		    	'class' => array(),
		    ),
		);

		if (is_admin()) {
			?>


			<script type="text/javascript">
							jQuery(document).ready(function($) {
							var counter = function() {
		
										$('#about-section, .counter').waypoint( function( direction ) {

											if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

												var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
												$(this.element).find('.number > span').each(function(){
													var $this = $(this),
														num = $this.data('number');
													$this.animateNumber(
													  {
													    number: num,
													    numberStep: comma_separator_number_step
													  }, 7000
													);
												});
												
											}

										} , { offset: '95%' } );

									}
									counter();
							});
			</script>

			<?php
		}

		?>




	<div class="site-section bg-image overlay counter" style="background-image: url('<?php echo esc_url($settings['background_image']['url']);?>');" id="about-section">
      <div class="container">
        <div class="row mb-5">
<?php if($settings['mission_video_preview']['url'] and $settings['mission_video_link']){ ?>

          <div class="col-lg-6 mb-4">
            <figure class="block-img-video-1" data-aos="fade">
              <a href="<?php echo esc_url($settings['mission_video_link'] );?>" class="popup-vimeo">
                <span class="icon"><span class="icon-play"></span></span>
         
                <img src="<?php echo esc_url($settings['mission_video_preview']['url'] );?>" alt="Image" class="img-fluid">
              </a>
            </figure>
          </div>
<?php } ?>

          <div class="col-lg-5 ml-auto align-self-lg-center">
            <h2 class="text-black mb-4 text-uppercase section-title"><?php echo esc_html($settings['mission_title']); ?></h2>
            <?php echo wp_kses($settings['mission_editor'],$allow_html); ?>
          </div>
        </div>
        <div class="row">
<?php if($settings['counter_list']) {
    	foreach ($settings['counter_list'] as $counter_item) { ?>
          <div class="col-md-6 mb-4 col-lg-0 col-lg-3">
            <div class="block-counter-1">
              <span class="number"><span data-number="<?php echo $counter_item['counter_number']?>">0</span></span>
              <span class="caption text-black"><?php echo $counter_item['counter_title']?></span>
            </div>
          </div>
         <?php } } ?>
        </div>
      </div>
    </div>

<?php
	    
	}

}