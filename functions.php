<?php

	/*
		
	Plugin Name: Pla Protfolio
	Plugin URI: https://amarplugin.com
	Author: Majadul Islam Pallab
	Author URI: https://facebook.com/majadul.3532
	Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus eu sem sagittis auctor. Duis vulputate felis pulvinar odio interdum, ut tempor sapien maximus. Curabitur luctus diam vitae dui tempus cursus. In hac habitasse platea dictumst. 
	Version: 1.0

	License: GPL-2.0+
	License URI: http://www.gnu.org/licenses/gpl-2.0.txt


	*/


	add_action("init",'protfolio');

	function protfolio() {

		register_post_type('pla-protfolio', array(

			'public'	=> true,
			'labels'	=> array(
				"name"	=> "Pla Protfolio",
				'add_new'=> "Add Item",
				'add_new_item' => "Add new protfolio" 
			),

			'supports'	=> array('title','editor','thumbnail'),
			'menu_icon'	=> 'dashicons-editor-textcolor'
		));

	}

	// enque css, bootstrap cdn

	add_action('wp_enqueue_scripts', 'css_bootstrap_link');

	function css_bootstrap_link() {
		// bootstrap icon
		wp_register_style( 'pla-Font_Awesome', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css' );
		wp_enqueue_style('pla-Font_Awesome');

		// bootstrap icon
		wp_register_style( 'pla-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' );
		wp_enqueue_style('pla-bootstrap');
		
		// Main stylesheet
		wp_register_style( 'pla-stylesheet', PLUGINS_URL('css/style.css', __FILE__) );
		wp_enqueue_style('pla-stylesheet');

	}

// META BOX
	if(file_exists(dirname(__FILE__).'/metabox/init.php')) {
		require_once(dirname(__FILE__).'/metabox/init.php');
	}

	if(file_exists(dirname(__FILE__).'/metabox/config.php')) {
		require_once(dirname(__FILE__).'/metabox/config.php');
	}




	/**
	 * 
	 *  Pla portfolio shorcode
	 * 
	 */

	add_shortcode('pla-protfolio', function(){
		?>

		<div class="container">
			<div class="card-group py-5">


				<?php 

				$pla = new WP_Query(array(
					'post_type'	=> 'pla-protfolio',
					'posts_per_page' => 3
				));

				while($pla->have_posts()): $pla->the_post();
				?>

				<div class="card p-4">
					<div class="card-img-top">
						<?php the_post_thumbnail();?>
					</div>
					<div class="card-title">
						<h4><?php echo the_title();?></h4>
					</div>
					<div class="card-content">
						<p class="card-text"><?php echo  the_content();?></p>
					</div>
					<div class="cart-footer">

						<?php

							$page_id = get_the_id();

							$facebook = get_post_meta($page_id, "_fb-url", true);
							$whatsapp = get_post_meta($page_id, "_whatsapp-number", true);
							$instagram = get_post_meta($page_id, "_instagram-url", true);

						?>
						<div class="social text-center my-4">
							<!-- facebook -->
							<a href="<?php echo $facebook;?>"><i class="bi bi-facebook"></i></a>

							<!-- whatsapp -->
							<a href="<?php echo $whatsapp;?>"><i class="bi bi-whatsapp"></i></a>

							<!-- instagram -->
							<a href="<?php echo $instagram;?>"><i class="bi bi-instagram"></i></a>
						</div>
					</div>
				</div>

				<?php endwhile;?>
				
			</div>
		</div>

		<?php
	});