<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_leadership_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'leadership_section';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Leadership section', 'africa' );
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
			'leadership_info_section',
			[
				'label' => esc_html__( 'Leadership section', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'leadership_title',
			[
				'label' => esc_html__( 'Title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);

		$this->add_control(
			'leadership_description_editor',
			[
				'label' => esc_html__( 'Description', 'africa' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '', 'africa' ),
				'placeholder' => esc_html__( 'Type your description here', 'africa' ),
			]
		);
		

		$this->add_control(
				'leadership_count',
				[
					'label' => esc_html__( 'Leadership posts count', 'africa' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '-1',
					'placeholder' => esc_html__( 'Type posts count', 'africa' ),
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
	
<div class="site-section" id="team-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
              <h2 class="text-black text-uppercase section-title"><?php if($settings['leadership_title']){ echo $settings['leadership_title'];} ?></h2>
              <?php if($settings['leadership_description_editor']){ echo wp_kses( $settings['leadership_description_editor'], $allow_html);} ?>
          </div>
        </div>
			<div class="row" style="align-items:stretch;">	
 <?php  

	$args=array(
					'post_type' => 'leadership_gallery' ,
					'posts_per_page'=> $settings['leadership_count'],
					);
	$my_posts= get_posts($args);

	if($my_posts){
  		foreach($my_posts as $post) {
  				$leaderships_name = esc_attr(get_post_meta($post->ID,'leaderships_name', true));
					$social_network_icon_first = esc_attr(get_post_meta($post->ID,'social_network_icon_first', true));
					$social_network_icon_second = esc_attr(get_post_meta($post->ID,'social_network_icon_second', true));
					$social_network_icon_third = esc_attr(get_post_meta($post->ID,'social_network_icon_third', true));

  	?>

       	
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
            <div class="block-team-member-1 text-center rounded">
              <figure class="fig_margin_bottom">
                <img src="<?php $post_thamb_url= esc_url(get_the_post_thumbnail_url($post)); 
                						if($post_thamb_url){ echo $post_thamb_url; } ?> 
                 " alt="Image" class="img-fluid rounded-circle">
              </figure>
              <h3 class="font-size-20 text-white"> <?php if($leaderships_name){ echo $leaderships_name;} ?> </h3>
              <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3"> <?php if($post->post_title){echo esc_attr($post->post_title);} ?> </span>
              <?php  if($post->post_content){ echo wp_trim_words( wp_kses( $post->post_content, $allow_html ),10);} ?>
              <div class="block-social-1">
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class=" <?php  if($social_network_icon_first){ echo $social_network_icon_first;} ?>"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="<?php  if($social_network_icon_second){ echo $social_network_icon_second;} ?>"></span></a>
                <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="<?php  if($social_network_icon_third){ echo $social_network_icon_third;} ?>"></span></a>
              </div>
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
