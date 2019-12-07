<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'howkee_wordpress');

/** MySQL database username */
define('DB_USER', 'howkee_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'L@t1tud3');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~T/,kE)COR4VGO+y=3aAa$U)HtD2UoqGm{|nR5|-xl}?FNCK9l]DK|`m8{q)A`+`');
define('SECURE_AUTH_KEY',  'w5eLzp#EA}zu!AU!Zs-=Y.@t$&hH+p[Ww[-q=kydTm}@tnXXHq,:&#|:[^:g6oBX');
define('LOGGED_IN_KEY',    'jK!yQ1Bg-GA<<>%B+jeRS,|M(~8om{||D`D_$Q{+jk2E<p&D4!==z%.R=@LC+GY#');
define('NONCE_KEY',        'yf|,3!L3|rGj@x$tCjw{&7n>:@PCBq`qy*#mY~60ZLZf0=X//pQN{E<r{{(?`C6p');
define('AUTH_SALT',        '-rU)%a.nUqnUu/,;+*&GL}E`!-4~T+`^+}]C:Q&<>`LAb#=:1{9T+.T9Rz*pO_[o');
define('SECURE_AUTH_SALT', 'Md_:L7l7MH,~W6Y/WchqGry+=S-xY%=l2L^Dz|J4u?U;[]Wv1qJ]Gh<B&0A2#-6s');
define('LOGGED_IN_SALT',   'a)TnJFLkUy=J1cgYk`TrLHGyJEwu?[ha5ZKwTOUt^F=$jvl bU-6-bi)Sg^9Eo%+');
define('NONCE_SALT',       'Y++E~RP;V`g7H3cnWB}/1*`]f*J[mn+PBB:D}V*Dylr((X:LpJtt1%{<NHT-;0n/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
