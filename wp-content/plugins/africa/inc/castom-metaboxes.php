<?php 
	function addMetaboxes()
	{
		add_meta_box(
			'social_network_icons',
			'name',
			'add_social_network_icon_html',
			'leadership_gallery', // castom post type
			'normal',
			'default'
		);
	}

	/* callback function for view metabox */

	function add_social_network_icon_html($post)
	{
		$leaderships_name = get_post_meta($post->ID, 'leaderships_name', true);
		$social_network_icon_first = get_post_meta($post->ID, 'social_network_icon_first', true);
		$social_network_icon_second = get_post_meta($post->ID, 'social_network_icon_second', true);
		$social_network_icon_third = get_post_meta($post->ID, 'social_network_icon_third', true);
		echo "
		    <div style='display:grid; grid-template-columns:25% 25%;  row-gap:30%;'>

				<lable for='leaderships_name'> ". esc_html__('Leadership name','africa'). "</lable>
				<input type='text' id='leaderships_name' name='leaderships_name' value='".esc_html($leaderships_name)."'>
			
				<lable for='social_network_icon_first'> ". esc_html__('Social network icon first','africa'). "</lable>
				<input type='text' id='social_network_icon_first' name='social_network_icon_first' value='".esc_html($social_network_icon_first)."'>
			
			
				<lable for='social_network_icon_second'> ". esc_html__('Social network icon second','africa'). "</lable>
				<input type='text' id='social_network_icon_second' name='social_network_icon_second' value='".esc_html($social_network_icon_second)."'>
			
			
				<lable for='social_network_icon_third'> ". esc_html__('Social network icon third','africa'). "</lable>
				<input type='text' id='social_network_icon_third' name='social_network_icon_third' value='".esc_html($social_network_icon_third)."'>
			
	    	<div>
		";
	}
	
	function save_meta_box($post_id, $post)
	{	
		if (isset($_POST['leaderships_name'])) {
			if (is_null($_POST['leaderships_name'])) {
				delete_post_meta($post_id,'leaderships_name');
			}else{
				update_post_meta(
					$post_id, 
					'leaderships_name', 
					sanitize_text_field(esc_attr($_POST['leaderships_name']))
				);
			}
		}

		if (isset($_POST['social_network_icon_first'])) {
			if (is_null($_POST['social_network_icon_first'])) {
				delete_post_meta($post_id,'social_network_icon_first');
			}else{
				update_post_meta(
					$post_id, 
					'social_network_icon_first', 
					sanitize_text_field(esc_attr($_POST['social_network_icon_first']))
				);
			}
		}

		if (isset($_POST['social_network_icon_second'])) {
			if (is_null($_POST['social_network_icon_second'])) {
				delete_post_meta($post_id,'social_network_icon_second');
			}else{
				update_post_meta(
					$post_id, 
					'social_network_icon_second', 
					sanitize_text_field(esc_attr($_POST['social_network_icon_second']))
				);
			}
		}
		if(isset($_POST['social_network_icon_third'])){
			if (is_null($_POST['social_network_icon_third'])) {
				delete_post_meta($post_id,'social_network_icon_third');
			}else{
				update_post_meta(
					$post_id, 
					'social_network_icon_third', 
					sanitize_text_field(esc_attr($_POST['social_network_icon_third']))
				);
			}
			
		}
		return $post_id;
	}

	// add metabox
	add_action('add_meta_boxes','addMetaboxes');
	
	//save metabox
	add_action('save_post','save_meta_box',10,2);  