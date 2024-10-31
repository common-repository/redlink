=== Redlink ===
Contributors: ziodave, wikier
Donate link: http://redlink.co/?pk_campaign=WP-Plugin&pk_kwd=donate
Tags: redlink, semantic web
Requires at least: 3.3.0
Tested up to: 3.5.2
Stable tag: 1.0.19
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redlink: Are You Ready to Make Sense of Your Data?

== Description ==

The Redlink plug-in provides your blog with a growing list of semantic web features:
 
 * A shortcode to generate an annotation form where you can type text and see the related entities.

== Installation ==

1. Install Redlink either via the WordPress.org plugin directory, or by uploading the files to your server
2. Activate the plug-in
3. Insert the *[redlink_demo]* wherever you want the demo form to appear
4. Users can now use this form to try out Redlink

This is an example usage:

<pre>
[redlink_demo form_class="wpcf7-form"
              annotate_text="Annotate"
              edit_text="Edit"
              annotate_class="wpcf7-form-control wpcf7-submit"
              edit_class="wpcf7-form-control wpcf7-submit"]

Type here the default text to annotate, example:
The Open Source Project Apache Stanbol provides different features that
facilitate working with linked data.

[/redlink_demo]
</pre>

== Screenshots ==

1. A sample annotation result.

== Changelog ==

= 1.0.19 =
* Fix: update annotation-tool.js to support the new API format.

= 1.0.18 =
* Fix: piwik.min.js is loaded only if feedback is enabled.

= 1.0.17 =
* Other: add link tracking.

= 1.0.16 =
* Other: add support for piwik (usage analysis). Note that usage analysis is turned off by default and must be manually enabled using the feedback=true attribute.

= 1.0.15 =
* Other: update author information.

= 1.0.14 =
* Fix: update annotation tool (354229a) with fix for missing descriptions.

= 1.0.13 =
* no changes.

= 1.0.12 =
* Feature: update annotation tool (ddc38d3) with support for images in annotations.

= 1.0.11 =
* Feature: allow for html code in the annotator tool textarea.

= 1.0.10 =
* Other: update annotation tool stylesheets.

= 1.0.9 =
* Other: update annotation tool (to commit e84979c).

= 1.0.8 =
* Other: update annotation tool (added language support for single views).

= 1.0.7 =
* Feature: add animation on text annotations.
* Other: add *wikier* to developers list.

= 1.0.6 =
* Fix: fix missing files.
* Fix: fix buttons alignment in stylesheets.

= 1.0.5 =
* Feature: add styling parameters *form_class*, *annotate_class*, *edit_class* for the form, annotate button and edit button respectively.
* Fix: scope the stylesheet to avoid conflict with other classes.
* Fix: moved ajax spinner to stylesheets to avoid image not found error.

= 1.0.4 =
* Fix: page title.

= 1.0.3 =
* Fix: readme content.

= 1.0.2 =
* Fix: readme indentation.

= 1.0.1 =
* Feature: add annotate text, edit text and text parameters to the short-code 'redlink_demo'

= 1.0.0 =
* Initial release
