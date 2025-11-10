<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

?>
<section class="error">
	<?php get_template_part( 'template-parts/content/page_header' ); ?>

	<div class="page-content entry-content">
		<p>
			<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'misho-zazil' ); ?>
		</p>

		<?php
		get_search_form();

		$instance = array(
			'title' => ' ',
		);

		$args = array(
			'before_title' => ' ',
			'after_title' => ' '
		);

		the_widget( 'WP_Widget_Tag_Cloud', $instance, $args );
		?>
	</div><!-- .page-content -->
</section><!-- .error -->
