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
define( 'DB_NAME', 'bmwtatk1_wp920' );

/** MySQL database username */
define( 'DB_USER', 'bmwtatk1_wp920' );

/** MySQL database password */
define( 'DB_PASSWORD', '~,q%gn_(MoL@)' );

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
define( 'AUTH_KEY',         'z1kkqubkez0fcqtlidfanxsysf6xbphcjuwrn4pgz7zkkefegttumkfl3vnidosq' );
define( 'SECURE_AUTH_KEY',  'kflri0n1r6ziqlctw9rriaad4qpoxewwuzx3ywo1x6ow0tunwf0ogdpgytqlhchk' );
define( 'LOGGED_IN_KEY',    'ri1phm3trr1nmzydeorihib1jzgjerwuslgd1e2lkbre6aeefojbw9ayjnknmizg' );
define( 'NONCE_KEY',        'hrsdlhfjn45kmxpscrutjekqvrdzlayjmlhosbqnzftndcqpklweuoir0bsfaiat' );
define( 'AUTH_SALT',        'yk6kamr7119dtslmxevqnpvealklkxpaxgzuegjsptlws5teq90aqpe1bix5zva6' );
define( 'SECURE_AUTH_SALT', 'qxxyng8uidkpjifluecrgnybxil4kn7jssmi1uq990yz9oqszrhosws24fcqoey3' );
define( 'LOGGED_IN_SALT',   'xrtdxveob1s3p942whtckheqykpkrrkyc55jnzrr8a39fbenlykxgahrcg8basym' );
define( 'NONCE_SALT',       '9ver1djuaibnvjyvc3q2s9mfntr64lvpk67zttdh2pb6u2vnutyhkhlxgfxzfjhr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpuz_';

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
