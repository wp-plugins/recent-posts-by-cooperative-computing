=== Recent Posts by Cooperative Computing ===
Contributors: Cooperative Computing
Donate link: http://cooperativecomputing.com/
Tags: posts, authors, categories, category, tags, tag, latest, post, author, wordpress, recent, recent post, latest posts, widget
Requires at least: 2.8
Tested up to: 4.3
Stable tag: 1.0
License: GPLv2 or later

A plugin which enables you to get recent posts by authors, categories and tags, with featured images, excerpt, works for custom post types as well in your content and in sidebar with widget.

== Description ==

This plugin allows you to display an unordered list of post (or custom post type) links (with title, featured image and exceprt) to a specific author (or multiple authors), category (or multiple categories) and tag (or multiple tags). It can be called either with a shortcode or from within a theme file.

To call it with a shortcode, use `[recent]` below are the attributes you can use with this shortcode: <br /><br />
* Authors:
`[recent author="username or multiple usernames separated by comma"]` <br />
* Category:
`[recent category="category name or names separated by comma"]`  <br />
* Tag:
`[recent tag="tag name or names separated by comma"]`  <br />
* Post Type:
`[recent post_type="post type name"]`  <br />
* Show Posts:
`[recent show="number of posts to show"]`  <br />
* Show Excerpt:
`[recent excerpt="true (default is false)"]`  <br />
* Show Thumbnail:
`[recent thumbnail="true (default is false)"]` 

To call it from within a theme template, you have to wrap it in this PHP function: `<?php echo do_shortcode('your shortcode goes here'); ?>`

To use this plugin in sidebar by using widget:

* Go to themes > appearance > widgets
* Drag `Recent Posts Widget by CC` to the sidebar where you want to display.
* That's it.

== Installation ==

1. Upload the `recent-post-by-cc` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the `Plugins` menu in WordPress
3. Place `[recent]` in your posts or `<?php echo do_shortcode(`[recent]`); ?>` in your templates or use widget in your sidebar.

== Frequently Asked Questions ==

= No questions yet =

Really, none so far.

== Screenshots ==

1. Widget options from backend.

== Changelog ==

= 1.0 =
* First version, no changes yet.

== Upgrade Notice ==

* First version, no notice yet.