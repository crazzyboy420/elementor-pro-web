<?php

if ( function_exists('vc_path_dir') && function_exists('vc_map') ) {
	require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');

	if ( !function_exists('yozi_load_post_element')) {
		function yozi_load_post_element() {
			$layouts = array(
				esc_html__('Grid', 'yozi') => 'grid',
				esc_html__('List', 'yozi') => 'list',
				esc_html__('Carousel', 'yozi') => 'carousel',
			);
			$columns = array(1,2,3,4,6);
			vc_map( array(
				'name' => esc_html__( 'Apus Grid Posts', 'yozi' ),
				'base' => 'apus_gridposts',
				'icon' => 'icon-wpb-news-12',
				"category" => esc_html__('Apus Post', 'yozi'),
				'description' => esc_html__( 'Create Post having blog styles', 'yozi' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'yozi' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'yozi' ),
						"admin_label" => true
					),

					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'yozi' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'yozi' )
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination?', 'yozi' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'yozi' ),
						'value' => array( esc_html__( 'Yes, to show pagination', 'yozi' ) => 'yes' )
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Grid Columns','yozi'),
		                "param_name" => 'grid_columns',
		                "value" => $columns
		            ),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Layout Type", 'yozi'),
						"param_name" => "layout_type",
						"value" => $layouts
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'yozi' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'yozi' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'yozi' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'yozi' )
					)
				)
			) );
		}
	}
	add_action( 'vc_after_set_mode', 'yozi_load_post_element', 99 );

	class WPBakeryShortCode_apus_gridposts extends WPBakeryShortCode_VC_Posts_Grid {}
}