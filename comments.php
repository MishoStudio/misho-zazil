<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

misho_zazil()->print_styles( 'misho-zazil-comments' );

?>
<div class="comments-container">
	<?php
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<span>
				<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'misho-zazil' ),
						'<span>' . get_the_title() . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
				} else {
					printf(
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'misho-zazil' ) ),
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
				}
				?>
			</span>
		</h2><!-- .comments-title -->
	<?php
	} ?>
	<div id="comments" class="comments-area">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) {
			?>

			<?php the_comments_navigation(); ?>

			<?php misho_zazil()->the_comments(); ?>

			<?php
			if ( ! comments_open() ) {
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'misho-zazil' ); ?></p>
				<?php
			}
		}

		comment_form();
		?>
	</div><!-- #comments -->
</div>

