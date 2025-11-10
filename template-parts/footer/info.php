<?php
/**
 * Template part for displaying the footer info
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<?php print( esc_html__( 'Powered by ', 'misho-zazil' ) ); ?>
	<a target="_blank" href="<?php echo esc_url( __( 'https://wordpress.org/', 'misho-zazil' ) ); ?>">
		<?php print( esc_html__( 'WordPress', 'misho-zazil' ) ); ?></a><span class="sep">. </span>
	<?php
		print( esc_html__( 'Theme ', 'misho-zazil' ) );

		$theme_name = wp_get_theme()->get( 'Name' );
	?>
	<a target="_blank" href="<?php echo esc_url( __( 'https://mishostudio.com/downloads/zazil-wordpress-theme/', 'misho-zazil' ) ); ?>">
		<?php print( esc_html__( $theme_name ) ); ?></a>
	<?php print( esc_html__( ' by ', 'misho-zazil' ) ); ?>
	<a target="_blank" href="<?php echo esc_url( __( 'https://mishostudio.com/', 'misho-zazil' ) ); ?>">
		<?php print( esc_html__( 'Misho Studio' ) ); ?></a>.
</div><!-- .site-info -->
