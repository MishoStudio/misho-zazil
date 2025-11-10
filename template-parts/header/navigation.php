<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

if ( ! misho_zazil()->is_primary_nav_menu_active() ) {
	return;
}

?>

<nav id="site-navigation" class="main-navigation nav--toggle-sub nav--toggle-small" aria-label="<?php esc_attr_e( 'Main menu', 'misho-zazil' ); ?>"
	<?php
	if ( misho_zazil()->is_amp() ) {
		?>
		[class]=" siteNavigationMenu.expanded ? 'main-navigation nav--toggle-sub nav--toggle-small nav--toggled-on' : 'main-navigation nav--toggle-sub nav--toggle-small' "
		<?php
	}
	?>
>
	<?php
	if ( misho_zazil()->is_amp() ) {
		?>
		<amp-state id="siteNavigationMenu">
			<script type="application/json">
				{
					"expanded": false
				}
			</script>
		</amp-state>
		<?php
	}
	?>

	<button class="menu-toggle hamburguer hamburger--spring" aria-label="<?php esc_attr_e( 'Open menu', 'misho-zazil' ); ?>" aria-controls="primary-menu" aria-expanded="false"
		<?php
		if ( misho_zazil()->is_amp() ) {
			?>
			on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
			[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
			<?php
		}
		?>
	>
		<span class="hamburger-box" aria-expanded="true">
			<span class="hamburger-inner"></span>
		</span>
	</button>

	<div class="primary-menu-container">
		<?php misho_zazil()->display_primary_nav_menu( [ 'menu_id' => 'primary-menu' ] ); ?>
	</div>
</nav><!-- #site-navigation -->
