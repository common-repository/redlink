<?php
/*
Plugin Name: Redlink
Plugin URI: http://redlink.co/?pk_campaign=WP-Plugin&pk_kwd=wp-visit
Description: A RedLink plug-in to embed the sign-up form in your blog.
Version: 1.0.19
Author: David Riccitelli, Sergio Fernández, Thomas Kurz, Sebastian Schaffert
Author URI: http://redlink.co/company/team/?pk_campaign=WP-Plugin&pk_kwd=wp-authors
License: GPL2
*/

function redlink_demo_shortcode( $atts, $content = '' ) {

	$template       = plugins_url( '/template/template.html', __FILE__ );

	$form_class = ( isset( $atts['form_class'] )
		? esc_attr( $atts['form_class'] )
		: '' );
	$annotate_class = ( isset( $atts['annotate_class'] )
		? esc_attr( $atts['annotate_class'] )
		: 'rle_button' );
	$edit_class = ( isset( $atts['edit_class'] )
		? esc_attr( $atts['edit_class'] )
		: 'rle_button' );
	$submit_text    = ( isset( $atts['submit_text'] )    
		? esc_attr( $atts['submit_text'] )                  
		: 'Annotate' );
	$edit_text      = ( isset( $atts['edit_text'] )      
		? esc_attr( $atts['edit_text'] )                    
		: 'Edit' );
	$text 		    = ( ! empty( $content )              
		? str_replace( "'", "\\'", str_replace( "\n", '\n', $content ) )
		: 'The Open Source Project Apache Stanbol provides different features that facilitate working with linked data, in the netlabs.org early adopter proposal VIE I wanted to try features which were not much used before, like the Ontology Manager and the Rules component. Barack Obama is the President of the United States. The News of the project can be found on the website! Rupert Westenthaler, living in Austria, is the main developer of Stanbol. The United States are well integrated with many CMS like Drupal and Alfresco.'
	);
	$feedback       = ( isset( $atts['feedback'] ) && 'true' === $atts['feedback']
		? 'true'
		: 'false' );

	// if feedback is enabled, load the piwik js.
	if ( 'true' === $feedback ) {
		wp_enqueue_script( 'piwik-js',
 			plugins_url( '/js/piwik.min.js' , __FILE__ )
		);
	}

	// execute the annotator from the footer, after the scripts.
	add_action( 'wp_footer', 'redlink_annotator_in_the_footer', 21 );

	return <<<EOF

	<div id="redlink-demo"></div>

    <script type="text/javascript">
       	(function($){
            var annotatorFn = function() {
            	new Annotator({
	            	url: 'http://demo.api.redlink.io/',
	            	container: '#redlink-demo',
	            	template: '$template',
	            	formClass: '$form_class',
	            	buttonTexts: {
	            		annotate: '$submit_text',
	            		edit: '$edit_text'
	            	},
	            	buttonClasses: {
	            		annotate: '$annotate_class',
	            		edit: '$edit_class'
	            	},
	            	feedback: $feedback,
	            	text: '$text'
	            })
			};

			window.redlinkAnnotator = annotatorFn;
        })(jQuery);
    </script>
EOF;

}

function redlink_annotator_in_the_footer() {

	echo <<<EOF
		<script type="text/javascript">
			window.redlinkAnnotator();
		</script>

EOF;

}

function redlink_enqueue_scripts() {

    wp_enqueue_script( 'jquery-color-js',
    	plugins_url( '/js/jquery.color.js' , __FILE__ ),
		array( 'jquery' )
	);

    wp_enqueue_script( 'redlink-annotation-tool-js',
    	plugins_url( '/js/annotation-tool.js' , __FILE__ ),
		array( 'jquery', 'jquery-ui-core', 'jquery-ui-slider', 'jquery-color-js' )
	);

	wp_enqueue_style( 'redlink-annotation-tool',
		plugins_url( '/css/redlink-annotation-tool.css' , __FILE__ )
	);

}

add_action( 'wp_enqueue_scripts',   'redlink_enqueue_scripts' );
add_shortcode( 'redlink_demo' ,       'redlink_demo_shortcode' );
?>