<?php
class elementor_cta_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'cta_widgets';
}

public function get_title() {
	return __( 'Call To Action', 'EW-toolkit' );
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
            'default' => 'Free shipping',
		]
		
	);
    $this->add_control(
		'content',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'For standard orders over 50 USD',
		]
		
	);
    $this->add_control(
		'link_text',
		[
			'label' => __( 'Link Text', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'More info here',
		]
		
	);
    $this->add_control(
		'link_url',
		[
			'label' => __( 'URL', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::URL,
            'label_block' => true,
            'placeholder' => 'http://raselahmed.com',
		]
		
	);
    $this->add_control(
		'link_icon',
		[
			'label' => __( 'Link icon', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::ICON,
            'label_block' => true,
            'default' => 'fa fa-angle-right',
		]
		
	);
}

protected function render() {
	$settings = $this->get_settings_for_display();
    echo '
    <div class="title-widgets">
        <div class="top-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h3>'.$settings['title'].'</h3> 
        '.wpautop($settings['content']).'
        <a href="'.$settings['link_url']['url'].'">'.$settings['link_text'].'<i class="'.$settings['link_icon'].'"></i></a>
    </div>';

}
}