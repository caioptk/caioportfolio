<?php
define('WP_CACHE', true); // Added by SpeedyCache

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
define( 'DB_NAME', 'italoman_wp404' );

/** Database username */
define( 'DB_USER', 'italoman_wp404' );

/** Database password */
define( 'DB_PASSWORD', '[1-SO7MWp9' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'z3auawinpgu38i3ju6jpmdkqy2jxfdf8mm8ddeebm5gz3a0hdahdycaiqic7zs0v' );
define( 'SECURE_AUTH_KEY',  '7solxzjasirtj2argmhhundlljcpjd2dbvbwhy6kigzzz8r2sa2ug8eysvwu5gyr' );
define( 'LOGGED_IN_KEY',    'x2cokmdyiwraveadrg5gmskmvols5q9jv8qvm8jowdyeiwzhem0wksehbb0w1bgz' );
define( 'NONCE_KEY',        'uck4sskdjmgmpjm9ktc0ks2pgxhebziiwynssrukphrfbkmjltexe5txeyasyitg' );
define( 'AUTH_SALT',        'rcn1rpsvnvpnmf8zznhlm855fjie73m33nk3hskaihz1cu5qrlqumvmuz01sopzc' );
define( 'SECURE_AUTH_SALT', 'xkn3f7ziict5egt4heiom3sb0dzwh11wubjtpkfr95zuu9uq5wjzoobn4oyeuslu' );
define( 'LOGGED_IN_SALT',   'bolx5rryjzormrztr6zyacrerabrhmnpjsra1tohwcxe8f4tvnkftcyhh2uudl2t' );
define( 'NONCE_SALT',       'fybrfj08r9hz5f8xluj5imsspow3ewarorhrdqsvr1fxmo2wraspbm0fymlhyd5a' );

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
$table_prefix = 'wpg8_';

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
