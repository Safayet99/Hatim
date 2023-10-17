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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'e@Jz=73Dvjx9ut5Y,TVSo5)poiitlo+WY=/~5T(s,tQhQ|AviD{?;qqW4Y_DhO*T' );
define( 'SECURE_AUTH_KEY',  'HDr6nS.F;wb?H k!]`id;R.qWW$@Awo3$<8-jGwlY=OzW$bL&VsVzAXnYXuSdNQr' );
define( 'LOGGED_IN_KEY',    ']=nk-^A?+~WPaH]i5<852BOJ5;0!877jcd8#L|lG52#sRG1<VI]jwRy;seJ!Z@5-' );
define( 'NONCE_KEY',        'Dy0`Q0)GKJ(#C2;zhVcm|[c*9VZ#N~<NJBXMTe92mAmll$i~|:}.HdE~BRO#HxTU' );
define( 'AUTH_SALT',        'Do~46E,?(tgO@#yxSSA>)g+F_B<Ja-jiiQ7,U7]nj_9a[J[QVR)7$qGRzE2j4Q*a' );
define( 'SECURE_AUTH_SALT', '=h1#qPx_TbN7PFRHj&9EU PzInwXY}174,6rHyu5-Z5(f#CLB$id*!@875fa][*D' );
define( 'LOGGED_IN_SALT',   '{l1Go(jx?ZpFEX9`:2SRAOP9%,DA[d_pa+}WQR{v+bLys`U66a2ZatKb &5eK!,b' );
define( 'NONCE_SALT',       '1C^SB=En/rifA11(7wWt~96Ey?UO$i7wFT(/BC1gIjY~=T`yI?t#HeO6u?g8Eo21' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
