# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 31-01-2018
### Added" > changelog.md
created first stage theme

## [1.0.1] - 19-02-2018
Amended theme as advised by WordPress theme review team
Invalid Theme URI.
https://make.wordpress.org/themes/handbook/review/required/#selling-credits-and-links
At least one and not more than three subject tags in needed on style.css
https://make.wordpress.org/themes/handbook/review/required/theme-tags/
Remove rtl.css file, it is not used on the theme. Remove every unwanted and commented codes and theme files.
Check your theme readme file. Is `Contributors: automatic`?
Mentioned the license of every external source used on the theme like image, JS, CSS etc. It is missing in readme file.
Remove layouts folder, it is not used on the theme.
Make your own pot file. You have default pot file.
Function name, global variables, image size name etc need to be prefixed with theme slug. It is missing. `cyclingclub_get_all_child_pages()`.
http://themereview.co/prefix-all-the-things/
Remove development files from the theme.

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

## [1.0.9] - 06-06-2018
### css font reference spelling
sans-serif corrected
### search widget
fix styling of search widget so in keeping with the default design
