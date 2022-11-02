<?php
class elementor_slider_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'elementor_slider';
}

public function get_title() {
	return __( 'Elementor Slider', 'EW-toolkit' );
}

protected function _register_controls() {

	$this->start_controls_section(
		'content_section',
		[
			'label' => __( 'Content', 'EW-toolkit' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	$repeater = new \Elementor\Repeater();

	$repeater->add_control(
		'slide_tilte', [
			'label' => __( 'Slide Tilte', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'label_block' => true,
		]
	);

	$repeater->add_control(
		'slide_content', [
			'label' => __( 'Slider Content', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'show_label' => true,
		]
	);

	$repeater->add_control(
		'slide_desc',
		[
			'label' => __( 'Slider Description', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
		]
	);
	$repeater->add_control(
		'slide_img',
		[
			'label' => __( 'Slider Image', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
		]
	);


	$this->add_control(
		'slides',
		[
			'label' => __( 'Slider', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
	
		]
	);

	$this->end_controls_section();

	$this->start_controls_section(
		'sldie_settings',
		[
			'label' => __( 'Slider Settings', 'EW-toolkit' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
	$this->add_control(
		'enable_dots',
		[
			'label' => __( 'Enable Dots?', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'EW-toolkit' ),
			'label_off' => __( 'No', 'EW-toolkit' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
		
	);
	$this->add_control(
		'enable_loop',
		[
			'label' => __( 'Enable Loop?', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'EW-toolkit' ),
			'label_off' => __( 'No', 'EW-toolkit' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
		
	);
	$this->add_control(
		'enable_fade',
		[
			'label' => __( 'Enable Fade Effect?', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'EW-toolkit' ),
			'label_off' => __( 'No', 'EW-toolkit' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
		
	);
	$this->add_control(
		'enable_nav',
		[
			'label' => __( 'Enable Nav?', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'EW-toolkit' ),
			'label_off' => __( 'No', 'EW-toolkit' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
		
	);
	$this->add_control(
		'enable_autoplay',
		[
			'label' => __( 'Enable Autoplay', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'EW-toolkit' ),
			'label_off' => __( 'No', 'EW-toolkit' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
		
	);
	$this->add_control(
		'autoplayspeed',
		[
			'label' => __( 'Autoplay Speed', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '5000',
			'condition'=> [
				'enable_autoplay' => 'yes'
			],
			'options' => [
				'1000'  => __( '1 Secound', 'EW-toolkit' ),
				'2000' => __( '2 Secound', 'EW-toolkit' ),
				'3000' => __( '3 Secound', 'EW-toolkit' ),
				'4000' => __( '4 Secound', 'EW-toolkit' ),
				'5000' => __( '5 Secound', 'EW-toolkit' ),
				'6000' => __( '6 Secound', 'EW-toolkit' ),
				'7000' => __( '7 Secound', 'EW-toolkit' ),
				'8000' => __( '8 Secound', 'EW-toolkit' ),
				'9000' => __( '9 Secound', 'EW-toolkit' ),
				'10000' => __( '10 Secound', 'EW-toolkit' ),
				'11000' => __( '11 Secound', 'EW-toolkit' ),
				'12000' => __( '12 Secound', 'EW-toolkit' ),
				'13000' => __( '13 Secound', 'EW-toolkit' ),
				'14000' => __( '14 Secound', 'EW-toolkit' ),
				'15000' => __( '15 Secound', 'EW-toolkit' ),
			],
		]
	);



	$this->end_controls_section();

}

protected function render() {
	$settings = $this->get_settings_for_display();
	$dynamic_num = rand(34322433,4434344);

	if ( $settings['slides'] ) {
		if(count($settings['slides']) >1){
			if($settings['enable_dots'] == 'yes'){
				$dots = 'true';
			}else{
				$dots = 'false';
			}
			if($settings['enable_loop'] == 'yes'){
				$loop = 'true';
			}else{
				$loop = 'false';
			}
			if($settings['enable_fade'] == 'yes'){
				$fade = 'true';
			}else{
				$fade = 'true';
			}
			if($settings['enable_nav'] == 'yes'){
				$nav = 'true';
			}else{
				$nav = 'false';
			}
			if($settings['enable_autoplay'] == 'yes'){
				$autoplay = 'true';
			}else{
				$autoplay = 'false';
			}

			echo '
			<script type="text/javascript">
			   jQuery(document).ready(function($){
                   $("#slides-'.$dynamic_num.'").slick({
					arrows:'.$nav.',
					dots: '.$dots.',
                    infinite: '.$loop.',
					nextArrow:"<button class=\'arrow-next\'><i class=\'fas fa-angle-right\'></i></button>",
					prevArrow:"<button class=\'arrow-prev\'><i class=\'fas fa-angle-left\'></i></button>",
					fade:'.$fade.',
					autoplay: '.$autoplay.',';
					if($autoplay == 'true'){
						echo'
						autoplaySpeed: '.$settings['autoplayspeed'].',
						';
					}
					echo '
				   });
			   });
			</script>
			';
		}
		echo '<div id="slides-'.$dynamic_num.'" class="slides">';
		foreach (  $settings['slides'] as $slide ) {
		echo '
		<div class="single-slide-item" style="background-image:url('.wp_get_attachment_image_url($slide['slide_img']['id'],'large').')">
	        <div class="row">
			    <div class="col my-auto">
				    '.wpautop($slide['slide_content']).'
				</div>
			</div>
			<div class="slide-info">
			    <h4>'.$slide['slide_tilte'].'</h4>
		         '.$slide['slide_desc'].'
			</div>
		</div> 
		'; 
			
		}
		echo '</div>';
	}
}
}