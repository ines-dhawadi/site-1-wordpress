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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exercice1' );

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
define( 'AUTH_KEY',         'w1veu<@fjRT}&;*dy+4>-94dw=qwX&?qPtSoExzLcOFzWEg?B[h<<:HuEGUe]E:2' );
define( 'SECURE_AUTH_KEY',  '9g=-5v%LF&$iPHq?}Y~h[deM;zBz:lGj.Dqn{Q?=y~O(17==IVE7MCxzO1pd+JP?' );
define( 'LOGGED_IN_KEY',    '^R.c,/eQ{_qJ}DB>!BQylE1.+ dfos(9_6%iObKcwfV4pf#>V-(Nqv+cP`_J-#@<' );
define( 'NONCE_KEY',        'zxSG8?L}xF!bXMz~ hS_M4`c=hafCSOOzJiV<_4Xo}H--|PWFh&S9|``?)oF{7U^' );
define( 'AUTH_SALT',        '}z]V%?<(jWc.e?~00(}}VvugI?Ar5bW#vfT$M_u6&YGYoAugTbrWw@SPh`jZ$Z,]' );
define( 'SECURE_AUTH_SALT', 'J8@Y6,XOk{[n Kl=[ls+IW<[5bbM/FTiC>W^>=.bw>~@?h>4@kpl#2+,5tbSK)73' );
define( 'LOGGED_IN_SALT',   'j2wg>x<,>+;LlTgRD85;BpezKw*gPsX.9-<=l{ZDzr2Y<prMg|P|wVzplvO?nJpO' );
define( 'NONCE_SALT',       '.BL$@(zZ]ueU=l)utPr IIXgaX %-)#8JrDqw%DlAQW 6O:pYoYrC$BwWJn*.V(d' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'FS_METHOD', 'direct' );

