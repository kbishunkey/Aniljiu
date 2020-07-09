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
define( 'DB_NAME', 'aniljiu_db' );

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
define( 'AUTH_KEY',         '~{[)Tn|Y+!+G0lOK0+>#as+9BGz`C>WOY#D&GD{mcG}C(gt`yyisJ3Q~OOCwAh,W' );
define( 'SECURE_AUTH_KEY',  'Z^0&t,QA*hLV1q^0jE87u(@cw[`L$OrLY8wfqo%mXIlM3qozjY`IA-OG/+{I98@:' );
define( 'LOGGED_IN_KEY',    'e<$DU~SiUds;DvAXyw.-!RQ6z9rBovT)MQw|S@O>:WltpZI1 o6omCix.RJm10rk' );
define( 'NONCE_KEY',        'WN$D5VS1F##:06hqa|GJbx=c*U6nN~O~M;0-sa2t/Hh-K^0$yZ+jp#(^Tll-{V25' );
define( 'AUTH_SALT',        'E|@6y2VH_|9BNcwke/~+vLg{.%Mb<1:r<ZN3K&p+^YgWhx5gnNJOJWCnrm{c0h.V' );
define( 'SECURE_AUTH_SALT', 'W&}v(qPuE3a-@8wB~7qK`38-9n)H*=kx]@S%CJ3rf(T}OfnwXt.N3|FH0u*,.bt@' );
define( 'LOGGED_IN_SALT',   '0O=`]>]e/E$GIg0/]rO`&+2+pzhm^Q<Hnej^t3y5&4vv~rTjC5<AH[F>h5 j<1^b' );
define( 'NONCE_SALT',       'GT:U%.<m8|n?zj>Oj^A/!,gD&TB,kr!^>wf5/S3!*l]DxU#br-`=Oh:bq]f9E3}F' );

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
