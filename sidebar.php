<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

if ( ! misho_zazil()->is_primary_sidebar_active() ) {
	return;
}

misho_zazil()->print_styles( 'misho-zazil-sidebar', 'misho-zazil-widgets' );

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<div class="sticky-container">
		<?php misho_zazil()->display_primary_sidebar(); ?>
	</div>
</aside><!-- #secondary -->
