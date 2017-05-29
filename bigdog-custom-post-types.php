<?php
/**
 * Custom Post Types
 *
 * @package     BigDog
 * @author      Big Dog Digital
 * @copyright   2017 Big Dog Digital
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Big Dog Custom Post Types
 * Plugin URI:  https://docs.bigdog.ie
 * Description: This plugin creates any custom post types required for a specific project.
 * Version:     1.0.0
 * Author:      Big Dog Digital
 * Author URI:  https://www.bigdog.ie
 * Text Domain: bigdog-custom-post-types
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace BigDog;

//bails if file is loaded directly
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'You seem to have lost your way.' );
}

/** Plugin Configuration */

add_action( 'init', __NAMESPACE__ . '\launch' );
function launch() {
	create_post_types();
	create_product_type_taxonomies();
}

function create_post_types(){

	/*
		Products
	*/
	register_post_type( 'bsn_products',
		array(
			'labels' => array(
				'name' => 'Products',
				'singular_name' => 'Product',
				'add_new' => 'Add New Product',
				'add_new_item' => 'Add New Product',
				'edit_item' => 'Edit Product',
				'new_item' => 'New Product'
			),
			'public' => true,
			'rewrite' => array(
				'slug' => 'products'
			),
			'supports' => array(
				'title',
				'editor',
				'page-attributes',
				'thumbnail',
			)
		)
	);

	/*
		Athletes
	*/
	register_post_type( 'bsn_athletes',
		array(
			'labels' => array(
				'name' => 'Athletes',
				'singular_name' => 'Athlete',
				'add_new' => 'Add New Athlete',
				'add_new_item' => 'Add New Athlete',
				'edit_item' => 'Edit Athlete',
				'new_item' => 'New Athlete'
			),
			'public' => true,
			'rewrite' => array(
				'slug' => 'athletes'
			),
			'supports' => array(
				'title',
				'editor',
				'page-attributes',
				'thumbnail',
			)
		)
	);

	/*
		Goals
	*/
	register_post_type( 'bsn_goals',
		array(
			'labels' => array(
				'name' => 'Goals',
				'singular_name' => 'Goal',
				'add_new' => 'Add New Goal',
				'add_new_item' => 'Add New Goal',
				'edit_item' => 'Edit Goal',
				'new_item' => 'New Goal'
			),
			'public' => true,
			'rewrite' => array(
				'slug' => 'goals'
			),
			'supports' => array(
				'title',
				'editor',
				'page-attributes',
				'thumbnail',
			)
		)
	);
}



/*

	Create the Product Types

*/

function create_product_type_taxonomies() {

	$labels = array(
		'name' => _x( 'Product Types', 'products' ),
		'singular_name' => _x( 'Product Type', 'product' ),
		'search_items' =>  __( 'Search Product Types' ),
		'all_items' => __( 'All Product Types' ),
		'parent_item' => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item' => __( 'Edit Product Type' ),
		'update_item' => __( 'Update Product Type' ),
		'add_new_item' => __( 'Add New Product Type' ),
		'new_item_name' => __( 'New Product Type Name' ),
	);

	register_taxonomy( 'product_type', array( 'bsn_products' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'product' ),
	));

}




