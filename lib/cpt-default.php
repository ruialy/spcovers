<?php

/*
 * Example CPT using extended_cpts and extended_taxos
 */

register_extended_post_type( 'portfolio', array(

			'enter_title_here' => 'Portfolio Name',
			'quick_edit' => false,
			'menu_icon' => 'dashicons-businessman',

			'admin_cols' => array(
				'processes' => array(
					'taxonomy' => 'process',
					'title'    => _x( 'Processes', 'Processes', 'portfolio' ),
					),
				'material' => array(
					'taxonomy' => 'material',
					'title'    => _x( 'Material', 'Material', 'portfolio' ),
					),
				'portfolio_type' => array(
					'taxonomy' => 'portfolio-type',
					'title'    => _x( 'Type', 'Type', 'portfolio' ),
					),
				'industry' => array(
					'taxonomy' => 'industry',
					'title'    => _x( 'Industry', 'Industry', 'portfolio' ),
					),
				'post_date' => array(
					'title'      => __( 'Added', 'Date', 'portfolio' ),
					'post_field' => 'post_date',
					),
				'post_modified' => array(
					'title'      => __( 'Last Changed', 'Date', 'portfolio' ),
					'post_field' => 'post_modified',
					),
				),
				'admin_filters' => array(
					'processes' => array(
						'taxonomy' => 'process',
						'title'    => _x( 'Process', 'Process', 'portfolio' ),
					),
					'material' => array(
						'taxonomy' => 'material',
						'title'    => _x( 'Material', 'Material', 'portfolio' ),
					),
					'portfolio_type' => array(
						'taxonomy' => 'portfolio-type',
						'title'    => _x( 'Type', 'Type', 'portfolio' ),
					),
					'industry' => array(
						'taxonomy' => 'industry',
						'title'    => _x( 'Industry', 'Industry', 'portfolio' ),
					),
				),
		),
	array(
		# Override the base names used for labels:
		'plural'   => 'Portfolio',
		'slug'     => 'portfolio',
	)
);

register_extended_taxonomy( 'process', 'portfolio', array(), array( 'plural' => 'Processes', 'slug' => 'processes' ) );
register_extended_taxonomy( 'material', 'portfolio' );
register_extended_taxonomy( 'portfolio-type', 'portfolio' );
