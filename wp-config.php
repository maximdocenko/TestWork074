<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'TestWork074' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R7pE~P@Q_o zijXUg3bu&K/G|n{>@5wJ<FTi&4#/>p?tRwN$Wskg.y,%L];cN>1l' );
define( 'SECURE_AUTH_KEY',  'OT)7p3e)U_-v8iO n|YP@rX$XtRqD=`8Pc}*[+iK{.Krqp%1e9LKES+/h~vPyrVW' );
define( 'LOGGED_IN_KEY',    '(WuYZ(&3E*H|;Cr$M]_,P]t3kV4Y0SR?wk9:euGr:3PH$.v!&{H/7}nl0y7}0W2G' );
define( 'NONCE_KEY',        'tU0&L=yhr(sQ&r 5xnaiI&GLM<p:I^Pd#JI<^cTsbjL_soUv>AM636_NnyasLeNx' );
define( 'AUTH_SALT',        'fgcHv{=+B~j9$LaR;wP>Te_,rtzV4luhmu9u;u(F6z9]J%VUvL`ic1/:Jvsg94pv' );
define( 'SECURE_AUTH_SALT', '+cw[clzc*/7]RJ.[nm;xUIJ-DU7[u>C1]atpCJ5,G2|E#-wA|L~)k)VZ<@6m<&}z' );
define( 'LOGGED_IN_SALT',   ' Plm<j*;[-[}_SznH1C82C7MMR?V8`1~Jyeyp`r,)@/3)LIBD{;&<t,}5tUbh<_8' );
define( 'NONCE_SALT',       '[pTE@J(pjB412g9o!(L}r=@wzlT#,Vc^_k]9Y)LKdN8F}9ekGzeFVl?<)C#/d48n' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
