<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_discaver_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'discaver_section';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Discaver', 'africa' );
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
			'discaver_escription_section',
			[
				'label' => esc_html__( 'Discaver description', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
//repiter
//ADD widget element

		$this->add_control(
			'discaver_description_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'discaver_description_editor',
			[
				'label' => esc_html__( 'Description', 'africa' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '', 'africa' ),
				'placeholder' => esc_html__( 'Type your description here', 'africa' ),
			]
		);
		$this->end_controls_section();

// open description widget data


		$this->start_controls_section(
			'content_discaver_section',
			[
				'label' => esc_html__( 'Discaver data', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$discaver_repeater = new \Elementor\Repeater();

			$discaver_repeater->add_control(
				'discaver_data_description_title',
				[
					'label' => esc_html__( 'Discaver Description Title', 'africa' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Default title', 'africa' ),
					'placeholder' => esc_html__( 'Type your title here', 'africa' ),
				]
			);

			$discaver_repeater->add_control(
				'discaver_data_description_editor',
					[
						'label' => esc_attr__( 'Description', 'africa' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_attr__( '', 'africa' ),
						'placeholder' => esc_attr__( 'Type your description here', 'africa' ),
					]
				);

			$discaver_repeater->add_control(
				'discaver_content_image',
					[
						'label' => esc_html__( 'Choose Discaver Content Image', 'plugin-name' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
				);

			$discaver_repeater->add_control(
				'discaver_first_subtitle',
					[
						'label' => esc_html__( 'First Subtitle', 'africa' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Default first subtitle', 'africa' ),
						'placeholder' => esc_html__( 'Type your first subtitle here', 'africa' ),
					]
				);

			$discaver_repeater->add_control(
				'discaver_second_subtitle',
					[
						'label' => esc_html__( 'Second Subtitle', 'africa' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Default second subtitle', 'africa' ),
						'placeholder' => esc_html__( 'Type your second subtitle here', 'africa' ),
					]
				);

			$discaver_repeater->add_control(
				'discaver_first_namber',
					[
						'label' => esc_html__( 'First Namber', 'africa' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Default first namber', 'africa' ),
						'placeholder' => esc_html__( 'Type your first namber here', 'africa' ),
					]
				);

			$discaver_repeater->add_control(
				'discaver_second_namber',
					[
						'label' => esc_html__( 'Second Namber', 'africa' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Default second namber', 'africa' ),
						'placeholder' => esc_html__( 'Type your second namber here', 'africa' ),
					]
				);


		$this->add_control(
			'discaver_list',
			[
				'label' => esc_html__( 'Discaver content\'s data', 'africa' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $discaver_repeater->get_controls(),
				'default' => [
					[
						'discaver_data_description_title' => esc_attr__( 'Discaver title', 'africa' ),
						'discaver_data_description_editor' => esc_attr__( 'Discaver description. Click the edit button to change this text.', 'africa' ),
						'discaver_content_image' => esc_attr__( 'Enter content image.', 'africa' ),
						'discaver_first_subtitle' =>  esc_attr__( 'Enter first subtitle.', 'africa' ),
						'discaver_second_subtitle' => esc_attr__( 'Enter second subtitle.', 'africa' ),
						'discaver_first_namber'  => esc_attr__( 'Enter first namber.', 'africa' ),
						'discaver_second_namber' => esc_attr__( 'Enter second namber.', 'africa' ),
					]
				],
				'title_field' => esc_attr__('Discaver content\'s data','africa'),
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

		?>
	<div class="site-section bg-light counter" id="discover-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <div class="block-heading-1">
              <h2 class="text-black text-uppercase"><?php if($settings['discaver_description_title']){ echo esc_attr__($settings['discaver_description_title']);} ?></h2>
              <?php if($settings['discaver_description_editor']){ echo wp_kses($settings['discaver_description_editor'], $allow_html );} ?>
            </div>
          </div>
        </div>


        <?php  if ($settings['discaver_list']) {
        				$counter_i = 0;  //Счетчик элементов
        			 foreach ($settings['discaver_list'] as $discaver_item ){ 
        			 		$counter_i++;	?>    

				        <div class="row mb-5">

				          <div class="col-lg-6 mb-5    <?php echo ($counter_i%2 ? '':'order-lg-2'); ?>">
											<img src=" <?php if($discaver_item['discaver_content_image']){ echo esc_url( $discaver_item['discaver_content_image']['url']);} ?> " alt="Image" class="img-fluid">
				          </div>
				          <div class="col-lg-5 ml-auto align-self-center"  <?php echo ($counter_i%2 ? '':'order-lg-1'); ?>  >
				            <h3 class="text-black text-uppercase mb-4"><?php if($discaver_item['discaver_data_description_title']){ echo esc_attr__($discaver_item['discaver_data_description_title'], 'africa');} ?></h3>
				            <?php if($discaver_item['discaver_data_description_editor']){ echo wp_kses($discaver_item['discaver_data_description_editor'], $allow_html );} ?>

				            <div class="row mb-4">
				              <div class="col-md-6">
				                <div class="block-counter-1 block-counter-1-sm">
				                  <span class="number"><span data-number=" 
				                  	<?php if($discaver_item['discaver_first_namber']){ echo esc_attr($discaver_item['discaver_first_namber']);} ?> 
				                  	">0</span></span>
				                  <span class="caption text-black">
				                  	<?php if($discaver_item['discaver_first_subtitle']){ echo esc_attr__($discaver_item['discaver_first_subtitle'], 'africa');} ?> 
				                  </span>
				                </div>
				              </div>
				              <div class="col-md-6">
				                <div class="block-counter-1 block-counter-1-sm">
				                  <span class="number"><span data-number=" 
				                  	<?php if($discaver_item['discaver_second_namber']){ echo esc_attr($discaver_item['discaver_second_namber']);} ?> 
				                  
				                  	">0</span></span>
				                  <span class="caption text-black">
													<?php if($discaver_item['discaver_second_subtitle']){ echo esc_attr__($discaver_item['discaver_second_subtitle'], 'africa');} ?> 
				                  </span>
				                </div>
				              </div>
				            </div>          
				          </div>    
				        </div>
 <?php     }
        }   ?>
      </div>
    </div>
 


<?php
	    
	}
}
