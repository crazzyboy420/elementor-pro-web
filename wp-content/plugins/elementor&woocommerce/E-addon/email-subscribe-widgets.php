<?php
class elementor_email_subscribe_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'email_subscribe_widgets';
}

public function get_title() {
	return __( 'Email Subscribe Widgets', 'EW-toolkit' );
}

protected function _register_controls() {

	
	$this->start_controls_section(
		'content_section',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
	$this->add_control(
		'title',
		[
			'label' => __( 'Title', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Newsletter',
		]
		
	);
    $this->add_control(
		'content',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
            'label_block' => true,
            'default' => 'Sign up to receive the lastest fashion, trend and culture via email and get exclusive offers from 1992’s Shop.',
		]
		
	);
    $this->add_control(
		'post_title',
		[
			'label' => __( 'Post Bottom content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '@1992shop_online',
		]
		
	);
    $this->add_control(
		'post_icon',
		[
			'label' => __( 'Post Bottom Icon', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::ICON,
            'label_block' => true,
            'default' => 'fa fa-instagram',
		]
		
	);
	$this->end_controls_section();
}

protected function render() {
	$settings = $this->get_settings_for_display();
    echo '
    <div class="row">
       <div class="col-md-8">
       <div class="email-subscribe-widgets">
            <h2>'.$settings['title'].'</h2> ';
            echo do_shortcode('[contact-form-7 id="343" title="Subscribe"]');
             echo '
            '.wpautop($settings['content']).'
          </div>
       </div>
       <div class="col-md-4">
         <div class="recent-post">';
            global $post;
            $the_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page'=>9,
                'orderby'=>'date',
                'meta_key' => '_thumbnail_id',
                'ignore_sticky_posts' => 1
                )); 
            while ( $the_query->have_posts() ):$the_query->the_post();
                echo '<a href="'.get_the_permalink(get_the_ID()).'"><div class="post_thumb" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(),'medium').')"></div></a>';
            endwhile;
            echo '<div class="post-bottom-content"><a href=""><i class="'.$settings['post_icon'].'"></i>'.$settings['post_title'].'</a></div></div>';
            wp_reset_query();
       echo '
       </div>
    </div>';

}
}