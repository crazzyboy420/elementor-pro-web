<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'elementor' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'Q)CvS(P#@$eETW-IUjB]^xRSR5BS-v;:V%I&re^^Q*<s-(8~A%$WNYVe7q=!m&[M' );
define( 'SECURE_AUTH_KEY',  '(JO/x=7D[*|AvNpXbzg|rq&-~@a%qv^?=t =}qFf>s9n/W!+P#)-Jy)*q8f&,Y0O' );
define( 'LOGGED_IN_KEY',    'SZ&<GrgN6UphO?sMJc3vmR9vZZ./$-RuL6j!:k#BHX}d:o<#ExolqVn*Ff!$.>I9' );
define( 'NONCE_KEY',        'e+~apD8SQCc0XeZKP;5>NpcLO9cZ52V^FF0ZuMY|&vLXS9Q7>Orh<&LO7~tv/9C,' );
define( 'AUTH_SALT',        '.D/O06zdmv_~qy`lfQPHB.E}vj]_h7qo8WfFwHmPex*}<Iv;p$cB0@Ut8A$Db~a/' );
define( 'SECURE_AUTH_SALT', '+9iE$=rMkml6%|lVLQ(5h-y`l/zvxc,KePJKx/G90 *JqDEa%x8,d:xO&Q[e9<}T' );
define( 'LOGGED_IN_SALT',   'G=tllpnvjC@E]7PT=rbm6:+1xf9EHns4ujm^?z`h[v(ji].?-s2v}ZfqCKy*@^M-' );
define( 'NONCE_SALT',       'L$+em0mJczos!WR+elw5XE[~I*XVE]6B%#1r_ s-H@sQ`a7!eZ_}6ucaOkMpZA+a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
