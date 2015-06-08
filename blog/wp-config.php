<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'social_travel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Km)PIEcj+1Ck-if7|f&9tg*1D@k3qMJAar$.;>Dz!j8*;L#9y#4qLfu:}B8)?]_!');
define('SECURE_AUTH_KEY',  'l*b1F1N]4Yr7`i/V-n;)rT.b9`nRkeE}UI$`2DX*%!0f)BkJ`A}f]qfra/~Vfd^?');
define('LOGGED_IN_KEY',    'p>O]deD& `Ec!,gB8_v#p@sjQ )p2qup^Pv1NojVmk|9=k<$`uD-QJ<HzeA0(E+G');
define('NONCE_KEY',        'xFOU<Wzm ,r$WOnU)fl;d`}+/:O4jRXO Li_$mu@6A{;mWqCPKO.e7hi)xtFN^D*');
define('AUTH_SALT',        'x0%@fZHFh=u_%N,nP+:m1|oHfdC}J^)Do*D^Yh=Cl8@A3G*L~N*wlwM&7so[bMH}');
define('SECURE_AUTH_SALT', '/zrAJGA}Ar|nj=]=be9=Ai4bfk;q^Kp,SDXDU;o^N^C}`1+Mlmc[|J^SQ4ry$*Iq');
define('LOGGED_IN_SALT',   'Y**rgD4|5eyTZ$xYY{z*2Ej08SX{5AA<e|o(nQN?l)B_]Helk2uqdkHeq-]oEt8Q');
define('NONCE_SALT',       'QHshx3nu{;A6xEUpV2BCV&h<>g`j(C~B}DK9hbxGNUc345fN)8:L a-PlzB=L/r8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
