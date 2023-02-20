<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_testimonial_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'testimonial_section';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Testimonial section', 'africa' );
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
			'testimonial_info_section',
			[
				'label' => esc_html__( 'Testimonial section', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);
		

		$this->add_control(
				'testimonial_count',
				[
					'label' => esc_html__( 'Testimonial posts count', 'africa' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '-1',
					'placeholder' => esc_html__( 'Type posts count', 'africa' ),
				]
			);


		$this->add_control(
			'testimonial_background_image',
				[
					'label' => esc_html__( 'Choose Background Image', 'africa' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [],
					'dynamic' => [
						'active' => true,
					],
				]
			);


			$this->add_control(
			'testimionial_background_color',
			[
				'label' => esc_html__( 'Testimonial color', 'africa' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-image.overlay:after ' => 'background-color: {{VALUE}}',
				],
				'dynamic' => [
						'active' => true,
					],
			]
		);


		$this->end_controls_section();
	
	}


	protected function render() {

		function register_slider_scripts(){
						wp_enqueue_style( 'africa-owl.carousel.min', get_template_directory_uri() . "/assets/css/owl.carousel.min.css");
						wp_enqueue_style( 'africa-owl.theme.default.min', get_template_directory_uri() . "/assets/css/owl.theme.default.min.css");
						wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(),'1.0', true);
		}
		add_action( 'wp_enqueue_scripts', 'africa_scripts' );

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

		if(is_admin()){
		?>
	
			<script type="text/javascript">
			jQuery(document).ready(function($) {
					var siteCarousel = function () {
							if ( $('.nonloop-block-13').length > 0 ) {
								$('.nonloop-block-13').owlCarousel({
							    center: false,
							    items: 1,
							    loop: true,
									stagePadding: 0,
							    margin: 0,
							    autoplay: true,
							    nav: true,
									navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
							    responsive:{
						        600:{
						        	margin: 0,
						        	nav: true,
						          items: 2
						        },
						        1000:{
						        	margin: 0,
						        	stagePadding: 0,
						        	nav: true,
						          items: 2
						        },
						        1200:{
						        	margin: 0,
						        	stagePadding: 0,
						        	nav: true,
						          items: 3
						        }
							    }
								});
							}
					};
						siteCarousel();
			});
			</script>
<?php }?>

    <div class="site-section block-13 overlay bg-image" id="testimonials-section" data-aos="fade" style="background-image: url('<?php if($settings['testimonial_background_image']){ echo $settings['testimonial_background_image']['url'];} ?>');">
      <div class="container">
        
        <div class="text-center mb-5">
          <h2 class="text-white text-uppercase section-title"><?php if($settings['testimonial_title']){ echo $settings['testimonial_title'];} ?></h2>
        </div>
        <div class="owl-carousel nonloop-block-13">
		<?php
						 $args=array(
							'post_type' => 'testimonials',
							'numberposts' => (int)$settings['testimonial_count'],
							);
							 
							$my_posts = get_posts( $args );

						if($my_posts){
		  				foreach($my_posts as $post) {
  	?>


		        
		          <div>
		            <div class="block-testimony-1 text-center">
		              
		              <blockquote class="mb-4">
		                <p>&ldquo; <?php  if($post->post_content){ echo $post->post_content;} ?>&rdquo;</p>
		              </blockquote>

		              <figure class="fig_margin_bottom">
		                <img src="<?php $post_thamb_url= esc_url(get_the_post_thumbnail_url($post)); 
                						if($post_thamb_url){ echo $post_thamb_url; } ?> 
                						" alt="Image" class="img-fluid rounded-circle mx-auto">
		              </figure>
		              <h3 class="font-size-20 text-white"><?php if($post->post_title){echo esc_attr($post->post_title);} ?> </h3>
		            </div>
		          </div>

		        <?php 
		      				}
		      	}
		      	wp_reset_postdata();
		      	?>

        </div>

      </div>
    </div>



<?php

	}
}
