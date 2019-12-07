# Cycling Club Lite

**Contributors:** erichmond  
**Requires at least:** WordPress 4.9.5  
**Tested up to:** WordPress 4.9.5  
**Stable tag:** 1.0.7 
**Version:** 1.0.7
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  
**Tags:** two-columns, three-columns, right-sidebar, flexible-header, custom-background, custom-logo, custom-menu, custom-colors, featured-images, footer-widgets, threaded-comments, translation-ready, blog, sticky-post

The Cycling Club theme is a lite responsive WordPress theme ideally suited for amateur sports cycling clubs.

## Description

The Cycling Club theme has been specifically design to make it as flexible as possible for amateur sports cycling clubs to manage their clubs as easily as possible. 
 
A few notes about the sections above:
 
*   "Contributors" wp.orgusernames who developed this theme
*   "Tags" is a comma separated list of tags that apply to the theme
*   "Requires at least" is the lowest version that this theme will work on
*   "Tested up to" is the highest version that has *successfully been used to test this theme*. Note that it might work on
higher versions... this is just the highest one verified.


## Frequently Asked Questions

* To be confirmed after release
 
To be confirmed after release.


## Copyright

Cycling Club, Copyright 2018 Elliott Richmond
The Cycling Club theme is distributed under the terms of the GNU GPL

Cycling Club bundles the following third-party resources:

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
**License:** MIT
Source: https://necolas.github.io/normalize.css/

Google Fonts, Copyright Google Fonts
**License:**  Creative Commons Attribution 3.0.
Source: https://creativecommons.org/licenses/by/3.0/

Screenshot featured header image, Copyright Pixabay
**License:** CC0 1.0 Universal (CC0 1.0) 
Source: https://pixabay.com/en/people-man-woman-bike-bicycle-2597767/

Font Awesome Free
**License:** CC BY 4.0 License
Source: https://creativecommons.org/licenses/by/4.0/

### Changelog

## 1.0
* Released:TBC

Initial release

## [1.0.2] - 16-04-2018
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

## [1.0.3] - 03-05-2018
### Code issues
Remove MACOSX dir
use `wp_enqueue_script( 'font-awesome', ---)` instead of `wp_enqueue_script( 'cyclingclub-fontawesome', ---)`
admin check added for `modify_read_more_link()`
prefix added to various functions
### Translation Missing
Read more.. static string translation
### Copyrigt and licence
more rights and licences references added

## [1.0.5] - 08-05-2018
### Code issues
use `wp_enqueue_script( 'font-awesome', ---)` instead of `wp_enqueue_script( 'cyclingclub-fontawesome', ---)`
removed parameters from the function `get_the_date()`

## [1.0.6] - 25-05-2018
### Code issues
use of function prefix changed
removed alt tags on post thumbnail image function
default image set
screenshot images changed

## [1.0.7] - 01-06-2018
### Code issues
Bug in use of function naming for comments

## [1.0.8] - 02-06-2018
### Code issues
Bug in use of function naming for customizer
