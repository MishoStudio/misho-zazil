<?php
/**
 * Template part for displaying the header branding
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-branding">
	<?php the_custom_logo(); ?>

	<?php
	if ( is_front_page() && is_home() ) {
		?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
	} else {
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	}
	?>

	<?php
	$misho_zazil_description = get_bloginfo( 'description', 'display' );
	if ( $misho_zazil_description || is_customize_preview() ) {
		?>
		<p class="site-description">
			<?php echo $misho_zazil_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
		</p>
		<?php
	}
	?>
</div><!-- .site-branding -->
