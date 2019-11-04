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
define( 'DB_NAME', 'test' );

/** MySQL database username */
define( 'DB_USER', 'simon' );

/** MySQL database password */
define( 'DB_PASSWORD', 'simon' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'aiIer5@*35ukg*#8XCADX%UpHQC+Ng!MHA) KAar>n9CSx9E3m$)?/yyT#_8Ss:c' );
define( 'SECURE_AUTH_KEY',  '_^oYTw`53ha}a=eV_E[z{R^tR=mac3{U:Un$1S+A>Nuqgr[Q7B,VX}9 Ki0NzwH(' );
define( 'LOGGED_IN_KEY',    'a `ZaFe^_Ww`jhYADxrK:r9)>iu&Td}0c}hEXOu}CQ:#OK7Z;{iPz^ZJ}bucYVeF' );
define( 'NONCE_KEY',        'i_V.?6 =_`7w9|@3c)nv2p){lk[f5-j:!&?-eB.otj}XF[xI01]j^x@oTxT}NaR8' );
define( 'AUTH_SALT',        'Sfo3},KXC1sR*)A_2Ls7!,+q0MHs!f;hyYG:Dpx^Y.*jc<PaI/f(id{k11_<g(,^' );
define( 'SECURE_AUTH_SALT', '#(KwEkd_~;`>:XPo6DpEnqa^Sq~mjWlfV7h}}i@c{3l2tpK: ;5&afHJ_;P_u}=(' );
define( 'LOGGED_IN_SALT',   '?*jl.)?nnM-lo1uU,WhQ-Ggf#vxTPAIEQ*)R@mK22r:,bXY^O+!~_6vLat%<I<X1' );
define( 'NONCE_SALT',       '#LEyk`Ur5STe(r+GTSVceLWI{4Rt)y]}LxG=`j^wJlrP8o=N4=[~k:TVK+a2S~H ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
