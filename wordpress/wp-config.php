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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_602_core' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'qBeP5,L[x7S1{Zyr+C[-s3o|K|>lnFwQIrx6dM=Wb6BQV_}$4uUYW #*jOI}AGo+' );
define( 'SECURE_AUTH_KEY',  'A=CxUl/4>2e7?<qhXnY.MTyXV#jB6<[YiS//##yb68EIfafAO=9n3f$@#>TX@{9H' );
define( 'LOGGED_IN_KEY',    'eSV[1::u9?/HHOQ}iY_!;[?S+7Iyg->X8MZ;yEZ0#yD;3F7XnkgF8goENaK{Xn}4' );
define( 'NONCE_KEY',        ',OhS*m%Yj]`(<w#Q3OTY5+e@Ru?shak<OHQ`wImNi=RN#EtU]`)2f.PbrP>DD)2G' );
define( 'AUTH_SALT',        '0Et `:TK#u]6gk^V`4t.)`OslU`a!f2m (4Y2BNJ0p/IHGV4x$(+Wl.?$+uHHPe!' );
define( 'SECURE_AUTH_SALT', 'KwxY@q?Z897Q!wXRTtKlL)U7;o9M:cg$cY^~D:S&_V{Dx1q2;ZZ?A}TFU8gutcC[' );
define( 'LOGGED_IN_SALT',   'ADKqRH%AMhcN`b)Jl`Q{6n[NDefA 3&S;7&?)vPbg*-.($I(./Vc !j(b>/z5s6g' );
define( 'NONCE_SALT',       'r@M&)qD$Cp(H[%4rr0}cnG?)kc^[gP.W/gL.Yc#7&+SHF:WO8b9 5#tpuZ&(2e;x' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
