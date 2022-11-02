<?php
class elementor_content_blog_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'elementor_content_blog';
}

public function get_title() {
	return __( 'Elementor Content Blog', 'EW-toolkit' );
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
		'theme',
		[
			'label' => __( 'Theme', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SELECT,
            'label_block' => true,
            'default' => '1',
			'options' => [
                'theme-1'  => __( 'Theme 1', 'EW-toolkit' ),
                'theme-2' => __( 'Theme 2', 'EW-toolkit' ),
            ],
		]
		
	);
	$this->add_control(
		'title',
		[
			'label' => __( 'Title', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Girl LookBook 2021',
		]
		
	);
    $this->add_control(
		'content',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
            'show_label' => true,
		]
		
	);
    $this->add_control(
		'icon',
		[
			'label' => __( 'Icon', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-angle-double-right',
            'label_block' => true,
		]
		
    );
    $this->add_control(
		'image',
		[
			'label' => __( 'Image Background', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
            'label_block' => true,
		]
		
    );
    $this->add_control(
		'link',
		[
			'label' => __( 'Link', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'EW-toolkit' ),
            'label_block' => true,

		]
		
    );

	$this->end_controls_section();

}

protected function render() {
	$settings = $this->get_settings_for_display();
    if($settings['link']['is_external'] == true){
        $link_type = '_blank';
    }else{
        $link_type = '_self';
    }
    echo '
    <div class="content-box '.$settings['theme'].'">
        <div class="content-box-bg" style="background-image:url('.wp_get_attachment_image_url( $settings['image']['id'],'large').')"></div>
        <div class="content-box-content">
            '.wpautop($settings['content']).'
            <h6>'.$settings['title'].'</h6>
            <a terget="'.$link_type.'" href='.$settings['link']['url'].'><i class="'.$settings['icon'].'"></i></a>
        </div>
    </div>
    '; 
	

}
}