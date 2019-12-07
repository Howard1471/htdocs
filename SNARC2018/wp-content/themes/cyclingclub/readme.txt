=== Cycling Club ===

Contributors: Elliott Richmond
Tags: two-columns, custom-colors, footer-widgets

Requires at least: 4.9
Tested up to: 4.9
Stable tag: 1.0.2
License: GNU General Public License v2 or later
License URI: LICENSE

A starter theme called Cycling Club.

== Description ==

A Cycling Club Website for Cycling Clubs

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Cycling Club includes support for Infinite Scroll in Jetpack.

== Changelog ==

= 1.0 - Feb 19 2018 =
* Initial release

= [1.0.2] - 16-04-2018 =
removed MACOSX files
### Code issues
extarea should be textarea line 48 customizer_css.php
Use &hellip; instead of ...
Conditional check for `edit_post_link` on the file template-tags.php using `get_edit_post_link` like you have done in content-page.php template-tags.php line 182 wrong functions `esc_html` , use `esc_html__` instead
### Escaping Issues
Use `esc_attr` instead of `wp_kses` customizer_css.php
template-functions.php line 38, you should use `esc_url` on `get_permalink()`
header.php line 42, $description
### Translation Missing
template-functions.php line 38, Read more...
### Copyrigt and licence
all rights and licences referenced

= [1.0.3] - 03-05-2018 =
### Code issues
Remove MACOSX dir
use `wp_enqueue_script( 'font-awesome', ---)` instead of `wp_enqueue_script( 'cyclingclub-fontawesome', ---)`
admin check added for `modify_read_more_link()`
prefix added to various functions
### Translation Missing
Read more.. static string translation
### Copyrigt and licence
more rights and licences references added

= [1.0.5] - 08-05-2018 =
### Code issues
use `wp_enqueue_script( 'font-awesome', ---)` instead of `wp_enqueue_script( 'cyclingclub-fontawesome', ---)`
removed parameters from the function `get_the_date()`

= [1.0.6] - 25-05-2018 =
### Code issues
use of function prefix changed
removed alt tags on post thumbnail image function
default image set
screenshot images changed

= [1.0.7] - 01-06-2018 =
### Code issues
Bug in use of function naming for comments

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* screenshot uses an image from https://pixabay.com/ All contents are released under Creative Commons CC0, which makes them safe to use without asking for permission or giving credit to the artist - even for commercial purposes.

== Copyright ==

CyclingClub WordPress Theme, Copyright 2018 Elliott Richmond
CyclingClub is distributed under the terms of the GNU GPL

Cycling Club bundles the following third-party resources:

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
License: MIT
Source: https://necolas.github.io/normalize.css/

Google Fonts, Copyright Google Fonts
License:  Creative Commons Attribution 3.0.
Source: https://creativecommons.org/licenses/by/3.0/

Screenshot featured header image, Copyright Pixabay
License: CC0 1.0 Universal (CC0 1.0) 
Source: https://pixabay.com/en/people-man-woman-bike-bicycle-2597767/

Font Awesome Free
License: CC BY 4.0 License
Source: https://creativecommons.org/licenses/by/4.0/