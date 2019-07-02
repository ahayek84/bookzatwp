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
define( 'DB_NAME', 'bookzat_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'tXwy[3RApds/3oAz(cK-~iZD2k#LhX<u)<S!XM8B,|b1&>P/xuakn~|)FY>#zNsH' );
define( 'SECURE_AUTH_KEY',  '&4uHaY=={lY&EUxyDnnD,jmUNM,*+7eJ_Y36x4e+ f11lfvoLX#|d:>(fBV=u[7S' );
define( 'LOGGED_IN_KEY',    '>gVBM7)w-}>=ONC$1t<^%_%jV=4T[:MM`G2:(%jI+Shgrhrgh,oJi?1zL/vIbod|' );
define( 'NONCE_KEY',        '#1D?vWV!Yf:Yxah]q>2Y{p8J%Q64+2W:8 /3FT|_H@/5_?=lg N;lkz68[A6(gD@' );
define( 'AUTH_SALT',        'Qm-!?z-$U{M@hRvwZPV:~^@Gt-%v_<Y7( fGEox,{sZ^W|hI[uLp<#(;Ln<3rgbS' );
define( 'SECURE_AUTH_SALT', 'nWcT5bA+JHI@Qm2:5tnkXv@&i%CyynwApg8LT9h&J21*`g=E=_[Uuy>pyfOl`r*u' );
define( 'LOGGED_IN_SALT',   '>!/G$@(E2n[7YO%kNYipmy(PagBqjHGu[0akz7~NIKjM`f<[~ySLjc}R?-D`Fb2[' );
define( 'NONCE_SALT',       '2fc&nE!<>f^9s3lrKKBWJF4d||S~dKfoR5Q{e;&GR#q;nN(k[B2Dd,^~LS($%B9J' );

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
