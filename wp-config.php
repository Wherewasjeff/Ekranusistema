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
define( 'DB_NAME', 'ekranusistema' );

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
define( 'AUTH_KEY',         '*:vRLHr(6>h[i)4N3H9,1nIt[.*}UZ=2~G-eNL?$Td,ICG cAL-iqr@Jw@@(WUYe' );
define( 'SECURE_AUTH_KEY',  'B2{ts.)Y?s2Tj&u:iWej#l.MImeG[jxeI~x{`~M{%.5%L7oRf8WfQ84v%tCjsq:5' );
define( 'LOGGED_IN_KEY',    '9w<<=3??ZE*dX&O/;J[M+?5Dd@Csr2^51e4eP;vq*T07^NL|m]`r,xwAfp!6w9(|' );
define( 'NONCE_KEY',        'Sl`5)U7p`5e(|ve{.2 KqY?rUGEfnx6Ns&9VB]29pq*2_[4(>dLSqh-Zmu?xB(ma' );
define( 'AUTH_SALT',        '$L]_Onq}E*>_;,IkO&-st#>6mY=?[?==R3^Z<Ll(,|Lf&k]C d@h e vzcYq0X/d' );
define( 'SECURE_AUTH_SALT', 'Aa+5ix#GC]*qYAW>r62e;M@AJ2%9>:-*K=|yE6+G9l;3Z6eacVC&b{NQ{L50O_<]' );
define( 'LOGGED_IN_SALT',   '+tkt!$G)lPEJp^QJqnh,FwI]OGwI6NS$$y|8p^[7qDALE5jFju1)//IKZ:EezlCq' );
define( 'NONCE_SALT',       'e$$LXa}>8d]}iaAp)&Ow,#ph%[,Ydg[V21_o6Q{FkMLn0[l?t4 y+{J;xIe={@nu' );

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
$table_prefix = 'es_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
