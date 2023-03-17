<?php


namespace LidmoPrefix\Includes;

use LidmoPrefix\Interfaces\PagesTemplatesInterface;

class PageTemplates implements PagesTemplatesInterface{
	protected $templates;

	protected $templates_path;

	protected $pageTemplatesFilter;

	public function __construct() {

		$this->templates_path           = self::TEMPLATES_FOLDER;
		$this->templates                = self::PAGE_TEMPLATES;
		$this->pageTemplatesFilter      = ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ? 'page_attributes_dropdown_pages_args' : 'theme_page_templates' );

	}

	public function getPageTemplatesFilter(){

		return $this->pageTemplatesFilter;
	}

	public function addNewTemplate( $posts_templates ) {

		return array_merge( $posts_templates, $this->templates );

	}

	public function registerTemplates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}

	public function includeTemplates( $template ) {

		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {
			return $template;
		}

		$file = $this->templates_path . get_post_meta( $post->ID, '_wp_page_template', true  );

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

}
