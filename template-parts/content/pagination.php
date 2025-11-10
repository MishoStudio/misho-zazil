<?php
/**
 * Template part for displaying a pagination
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig;

the_posts_pagination(
	[
		'mid_size'           => 2,
		'prev_text'          => _x( 'Previous', 'previous set of search results', 'misho-zazil' ),
		'next_text'          => _x( 'Next', 'next set of search results', 'misho-zazil' ),
		'screen_reader_text' => __( 'Page navigation', 'misho-zazil' ),
	]
);
