<?php
function ew_category_list(){
    $term_id = 'product_cat';
    $categorise = get_terms( $term_id );
    $category['all'] = 'All Category';
    foreach($categorise as $cat){
        $cat_info = get_term( $cat, $term_id);
        $category[$cat_info->slug] = $cat_info->name;
    }
    return $category;
}
class elementor_product_carousel_wigets extends \Elementor\Widget_Base {

public function get_name() {
	return 'product_carousel_widgets';
}

public function get_title() {
	return __( 'Product Carousel', 'EW-toolkit' );
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
		'count',
		[
			'label' => __( 'Count', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
            'default' => '5',
		]
		
	);
    $this->add_control(
		'coloums',
		[
			'label' => __( 'Coloums', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SELECT,
            'show_label' => true,
            'default'   => '3',
            'options' => [
                '1'  => __( '1 Coloum', 'EW-toolkit' ),
                '2' => __( '2 Coloums', 'EW-toolkit' ),
                '3' => __( '3 Coloums', 'EW-toolkit' ),
                '4' => __( '4 Coloums', 'EW-toolkit' ),
            ],

		]
		
	);
    $this->add_control(
		'product_type',
		[
			'label' => __( 'Product Type', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SELECT,
            'show_label' => true,
            'default'   => 'products',
            'options' => [
                'products'   => __('Normal Product','EW-tookit'),
                'featured_products'  => __( 'Featured products', 'EW-toolkit' ),
                'sale_products' => __( 'Sale Product', 'EW-toolkit' ),
                'best_selling_products' => __( 'Best Selling Products', 'EW-toolkit' ),
                'recent_products' => __( 'Rcecent Products', 'EW-toolkit' ),
                'top_rated_products' => __( 'Top rated Products', 'EW-toolkit' ),
            ],

		]
		
	);
    $this->add_control(
		'category',
		[
			'label' => __( 'Select Category', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => ew_category_list(),
            'label_block' => true,
            'multiple'  => true,
            'default'   => 'all',
		]
		
    );

	$this->end_controls_section();

    $this->start_controls_section(
		'product_carousel_settings',
		[
			'label' => __( 'Product Carousel Settings', 'EW-toolkit' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
    $this->add_control(
		'carousel',
		[
			'label' => __( 'Carousel', 'EW-toolkit' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'EW-toolkit' ),
            'label_off' => __( 'No', 'EW-toolkit' ),
            'return_value' => 'yes',
            'default' => 'yes',
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
			'condition'=> [
				'carousel' => 'yes'
			],
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
			'condition'=> [
				'carousel' => 'yes'
			],
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
			'condition'=> [
				'carousel' => 'yes'
			],
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
			'condition'=> [
				'carousel' => 'yes'
			],
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
			'condition'=> [
				'carousel' => 'yes'
			],
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
	if(empty($settings['category'])){
		$cat_slug = implode(',',$settings['category']);
		if($cat_slug=='all'){
			$cat_list = '';
		}else{
			$cat_list = $cat_slug;
		}
	}else{
		$cat_list = '';
	}
    
   if($settings['carousel'] == 'yes' || !empty($settings['carousel'])){
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
		$dynamic_id = rand(2222222,999999);
        $html = '
        <script type="text/javascript">
            jQuery(document).ready(function($){
            $("#product-carousel-'.$dynamic_id.' .products").slick({
                slidesToShow:'.$settings['coloums'].',
                slidesToScroll: 4,
                dots: '.$dots.',
                arrows: '.$nav.',
                infinite:'.$loop.',
                nextArrow:"<button class=\'arrow-next\'><i class=\'fas fa-angle-right\'></i></button>",
				prevArrow:"<button class=\'arrow-prev\'><i class=\'fas fa-angle-left\'></i></button>",
                autoplay: '.$autoplay.',';
					if($autoplay == 'true'){
						echo'
						autoplaySpeed: '.$settings['autoplayspeed'].',
						';
					}
            $html .= '
            });
            });
        </script>
		<div  class="carousel" id="product-carousel-'.$dynamic_id.'">
        ';
    }else{
        $html = '';
    }
    
    $html .= do_shortcode('['.$settings['product_type'].' limit="'.$settings['count'].'" columns="'.$settings['coloums'].'" category="'.$cat_list.'"]');
    echo $html;
	if($settings['carousel'] == 'yes' || !empty($settings['carousel'])){
		$html .= '</div>';
	}
	

}
}