<?php 
	function castom_testimonial_post_type()
	{
		register_post_type( 'testimonials', [
			'label'  => "Testimonials gallery",
			'labels' => [
				'name'               => esc_html__('Testimonials','africa'), // основное название для типа записи
				'singular_name'      => esc_html__('Testimonial','africa'), // название для одной записи этого типа
				'add_new'            => esc_html__('Add testimonial','africa'), // для добавления новой записи
				'add_new_item'       => esc_html__('Addition testimonial','africa'), // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => esc_html__('Edit testimonial','africa'), // для редактирования типа записи
				'new_item'           => esc_html__('Create testimonial','africa'), // текст новой записи
				'view_item'          => esc_html__('View testimonial','africa'), // для просмотра записи этого типа.
				'search_items'       => esc_html__('Search testimonial','africa'), // для поиска по этим типам записи
				'not_found'          => esc_html__('Not found','africa'), // если в результате поиска ничего не было найдено
				'not_found_in_trash' => esc_html__('Not found in trash','africa'), // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => esc_html__('Testimonials','africa'), // название меню
			],
			'description'         => 'Testimonials gallery',
			'public'              => true,
			'publicly_queryable'  => null, // зависит от public
			'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'        => null, // показывать ли в меню адмнки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			//'rest_base'           => true, // $post_type. C WP 4.7
			'menu_position'       => null,
			'menu_icon'           => null,
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => ['title','editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => array('slag' => 'Testimonials'), 
			'query_var'           => true,
		] );
	}