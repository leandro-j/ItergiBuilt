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
define('DB_NAME', 'uaecono7_d14707u');

/** MySQL database username */
define('DB_USER', 'uaecono7_d14707u');

/** MySQL database password */
define('DB_PASSWORD', 'ctSK4*LL');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%UUS`x|L,;N:Wc^,QaR6+K?=N@r7Zwp#xN?7oO%A!cg| O2>PjV]P:F5Z}WS!tki');
define('SECURE_AUTH_KEY',  'P/;rxOeIp2{n9yjY@l[7CJ1UTy[,#<MNw$27t[R^8 .9cAum7l$Cgw~.o(A%&v}T');
define('LOGGED_IN_KEY',    '[bBCArh?4lp`;(+P2G]D V.8$?EwSa Z.Rca(x5w@lIx@B-7Wa74-Ps$KuLa}w9i');
define('NONCE_KEY',        '18yST>z|O6f_[VIAll]^y1zE+lym}Fw-wCf=Ylx&pIdD4AqJgQpu2JX^>$4qHCRW');
define('AUTH_SALT',        'pQd*SFJ[>KAn>I/t#H:EK}h0TZn!(ERhfk/uvNPVnsP$p+Wx;1U h|M2BCsD&yIv');
define('SECURE_AUTH_SALT', 'PrIy_#A[P(H!Y^p:E@ivpKMVmIDN].xwcqukMIvRw2-J%q9h|^`P-^MO|qU%+5ZE');
define('LOGGED_IN_SALT',   'N$X Ek0k_f-QN h,#(lA<<;2xbT,;Eo8!/-C~dxm=t:{PsK {Co#;w#,9FH5z`K]');
define('NONCE_SALT',       'xe7:g.IF7SP$5hCw,Tu))zl|g,DSlw]o78=*q^0#YNhw0lurq#aKy=A4A9@lO85x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'itergibuilt_wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
