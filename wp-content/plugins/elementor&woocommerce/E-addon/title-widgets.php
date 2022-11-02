<?php
class elementor_title_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'title_widgets';
}

public function get_title() {
	return __( 'Title Addon', 'EW-toolkit' );
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
            'default' => 'Hot items',
		]
		
	);
    $this->add_control(
		'content',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Spring & Summer 2015 Collection',
		]
		
	);
	$this->end_controls_section();
}

protected function render() {
	$settings = $this->get_settings_for_display();
    echo '
    <div class="title-widgets">
        <h3>'.$settings['title'].'</h3> 
        '.wpautop($settings['content']).'
    </div>';

}
}