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
define( 'DB_NAME', 'infinum_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY', 'AI; |k 33N{|2*y:NX%hGo@NV(p:+v-I-t2sj7$.feUG7raVHqR:s+>`$D5gP7Q ' );
define( 'SECURE_AUTH_KEY', '@`18Y66^sF3|Q-(r{_UM|l!zv{HxFFO4|x`gf(6uKaoe,yX~!qwMW$85oJo]WVlx' );
define( 'LOGGED_IN_KEY', 'Fp/f-%y_|WkAmyi?tBa.~i0]1EN?2s*IOCxU%7G0UD~nK6+e4F){)H<MJ*I?u#QC' );
define( 'NONCE_KEY', 'K<E.qn]W#74yup%, ]<tIgSUp7=sZ9&G}TM$,m~p)IJ-4u]ji&+A+XR[^gaz(Pmn' );
define( 'AUTH_SALT', 'zDH~ewT%`2z}5^M*.@E0/C/B]U1{kD&(ztD0i!G6WLBs47r!Qtx}qS7E X`EM]O+' );
define( 'SECURE_AUTH_SALT', '9G&1K)FCwQ,-g8ypgB:.~;J+Q3 :]O+dwLRe]jS!;J+ =8D;%P, Xho|w,aR&k3K' );
define( 'LOGGED_IN_SALT', 'N%}}$CPOc=P$N)`:Ob% Xl#fb@st2JaHJ{_jb+||_#f] ~$-Rph)/cvALx~1l5Qx' );
define( 'NONCE_SALT', '?;jJ~*9Pb+0sss.*V?,Wh)~9=4HyKuae/T=sTb!!aU&>KvHcRIto4Yo>C`eQ-x~F' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'inf_2019';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
