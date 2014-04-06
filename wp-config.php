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
define('DB_NAME', 'ubuntudanmark_d');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'f1f2f3');

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
define('AUTH_KEY',         'jo3I)VJR<bKEw#sAcKUE2Gyj+7[/olvz3%bU^Hv4k|SzP|CE,sUVlL:DM/&XbTH ');
define('SECURE_AUTH_KEY',  'Y|3=HXBd@tUgf-c?X`u0` >SwE+:8C3.;,23(6~,D9NXq(p!/FZ>B^E1m}[^3j#U');
define('LOGGED_IN_KEY',    '{l(+4(k*Ioq?IQ0.+hku=QIl+^5~q(;vpf<#Y7|q,)w+?!g/}P<vod+4-it3m^M^');
define('NONCE_KEY',        '8sp_++r{MNStH]7LM6Jaz 6N9av-HL@v,|?~Yto}PUK-Fb<~hq1^lUl-e])Y_ .1');
define('AUTH_SALT',        'l*{}AgV+mxhKG3)3:nPs?=k]_||W}WGVR*HW 7lQ|R|M4RD9F[.lDTvoO;nqzv9K');
define('SECURE_AUTH_SALT', '[l(x]3+Bkv0AF!~:)SEQ_m46_*8BVs&ZaGZPs&}|Agg|@=,>_TsLI=LXa~%:5p>7');
define('LOGGED_IN_SALT',   '{%Y5 Y5Sf*0V3z`c]Z63CQ&0rB$>e<yPD`@yQSdFF[~c;%],[o5*~kg3fIc42aEU');
define('NONCE_SALT',       'Zrxh@F*)C=&L&)lk kj4cO~eX|[&Cv+DvB,(m%IZd6kKHG:=y?f41iw.L[:+@t?D');

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
define ('WPLANG', 'da_DK');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

