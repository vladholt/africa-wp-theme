<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_recently_blog_widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'recently_blog_section';  //  slider's  id
	}

	public function get_title() {
		return esc_html__( 'Recently blog section', 'africa' );
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
			'Recently_blog_section',
			[
				'label' => esc_html__( 'Blog section', 'africa' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'blog_section_title',
			[
				'label' => esc_html__( 'Blog title', 'africa' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'africa' ),
				'placeholder' => esc_html__( 'Type your title here', 'africa' ),
			]
		);
		
		$this->add_control(
			'blog_descripion_section',
			[
				'label' => esc_html__( 'Blog description', 'africa' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_attr__( '', 'africa' ),
				'placeholder' => esc_attr__( 'Type your description here', 'africa' ),
			]
		);


		$this->add_control(
				'blog_section_count',
				[
					'label' => esc_html__( 'Testimonial posts count', 'africa' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '-1',
					'placeholder' => esc_html__( 'Type posts count', 'africa' ),
				]
			);

			$this->add_control(
			'blog_section_background_color',
			[
				'label' => esc_html__( 'Testimonial color', 'africa' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bg-image.overlay:after ' => 'background-color: {{VALUE}}',
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
		    'p'=> array(
		    	'class' => array(),
		    ),
		);

		?>
	
							
		<div class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-7 text-center mb-5 text-center">
            <h2 class="text-black text-uppercase section-title"><?php if($settings['blog_section_title']){ echo $settings['blog_section_title'];} ?></h2>
            <?php if($settings['blog_descripion_section']){ echo $settings['blog_descripion_section'];} ?>
          </div>
        </div>
        <div class="row">
         
         	<?php
						 $args=array(
							'post_type' => 'post',
							'numberposts' => (int)$settings['blog_section_count'],
							);
							 
							$my_posts = get_posts( $args );

						if($my_posts){
		  				foreach($my_posts as $post) {
		  				//	var_dump($post);
		  					$post_permalink = get_permalink($post);
		  					$post_date = get_the_date();

		  					if(!$post_permalink) $post_permalink = '#';
		  					if(!$post_date) $post_data = '';
  	?>

          <div class="col-lg-6">
            <div>
              <a href="<?php echo $post_permalink; ?>" class="mb-4 d-block"><img src="
              	<?php $post_thamb_url= esc_url(get_the_post_thumbnail_url($post)); 
                						if($post_thamb_url){ echo $post_thamb_url; } ?> 
									" alt="Image" class="img-fluid rounded"></a>
              <h2> <a href="<?php echo $post_permalink; ?>"><?php if($post->post_title){echo esc_attr($post->post_title);} ?></a> </h2>
              <p class="text-muted mb-3 text-uppercase small">
              				<span class="mr-2"><?php echo $post_date;?></span> 
              				By <a href="<?php echo $post_permalink; ?>" class="by"><?php echo get_the_author_meta('display_name');?></a>
              </p>
              <?php if($post->post_content){echo wp_kses($post->post_content,$allow_html);} ?>
              <p> <a href="<?php echo $post_permalink; ?>">Get Started</a> </p>
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
