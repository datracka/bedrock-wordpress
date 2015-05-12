<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product-category product item">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

		<?php

			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_image_src( $thumb, 'full' );

			$retina = krown_retina();
			$retina_thumb = get_post_meta( $post->ID, 'portfolio_retina-thumbnail_thumbnail_id', true );

			$c = get_option( 'krown_shop_columns', 'four' ) == 'four' ? 324 : ( get_option( 'krown_shop_columns', 'four' ) == 'three' ? 432 : 648 );
			$img_factor = floor( $img_url[1] / $c );
				
			$img_width = $img_factor * $c;

			if ( $retina === 'true' && $retina_thumb != '' ) {

				$retina_url = wp_get_attachment_image_src( $retina_thumb, 'full' );
				$image = aq_resize( $retina_url[0], $img_width*2, null, false, false );

			} else {

				$image = aq_resize( $img_url[0], $img_width, null, false, false );

			}  

		?>

		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php the_title(); ?>" class="image" />

		<div class="caption">

			<div>

				<div>

				<?php
					/**
					 * woocommerce_before_subcategory_title hook
					 *
					 * @hooked woocommerce_subcategory_thumbnail - 10
					 */
					do_action( 'woocommerce_before_subcategory_title', $category );
				?>

				<h3>
					<?php
						echo $category->name;

						if ( $category->count > 0 )
							echo apply_filters( 'woocommerce_subcategory_count_html', '(' . $category->count . ')', $category );
					?>
				</h3>

				<?php
					/**
					 * woocommerce_after_subcategory_title hook
					 */
					do_action( 'woocommerce_after_subcategory_title', $category );
				?>

				</div>

			</div>

		</div>

	</a>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>