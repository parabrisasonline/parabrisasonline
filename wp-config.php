<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'parabrisason');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '&,q-F}mXr]c{O&F:;A!igsRw/(i!(1t,/SSj)M2XK0rgT b(%%~I8]p[4:2xn+bd');
define('SECURE_AUTH_KEY',  '!oYqyj7]C>uyiD+kYV`Vlh<j2slXNe:@3erFHOCgf0k@3xsH}.br<Zy608??]g3Q');
define('LOGGED_IN_KEY',    '=qTa8/FKXNBo:]i$Tdg`!rZA9=vw3L[S<YioDY(f>]FkVktG)NOd)=L+C?K}h0,>');
define('NONCE_KEY',        'i+{U2HSji.;DnHR4iTFH>:CYz)yK8(ohTh3>5b Hi7fI[h;Th0 4k w^zYCu7C5~');
define('AUTH_SALT',        '`z,427@.jG<p+pUv/`iIX1Lmh<i&Z<VQ_|Pa[}NGYi{(cg4~#tT1s:Of~*`9 )3,');
define('SECURE_AUTH_SALT', '1u8:ZQ<5Q&}VW4JU=i4ItLP|*z*~4:r+(o,ZnTY@[mK/*ErB5c NvSz+b7N%}&cZ');
define('LOGGED_IN_SALT',   'A/D@./>2 ?c6D/(0YL8Av)_NO1h.AJ@yu*jMQf<tGGa7<6AHY^mLwalI%9F#,Brw');
define('NONCE_SALT',       'K*S[Jep(I]GkJ0n)9QLO<S,~n~h-gde~g.4Ww$`c+Lf]1A,KCs:jQ%08;-L 6sxD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'po_';

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
