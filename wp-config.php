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
define('DB_NAME', 'htgsoftweb_woodb');

/** MySQL database username */
define('DB_USER', 'htgsoftweb_woodb');

/** MySQL database password */
define('DB_PASSWORD', 'c3iEx8GXOU');

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
define('AUTH_KEY',         '5.npIwhc2vHgz~1UJ4cDmfQ(@a/AcCM+6u,~h(]AC9=-F<PKo!LvRi7S> &$;q.%');
define('SECURE_AUTH_KEY',  'U-]Ur]w75Q;N#hCdY@a>)}erLZ}#mUWy[^lbzJZVkDI^B4gE0,d;<; !GcgfS|G`');
define('LOGGED_IN_KEY',    'zMm-?>}3AgwSc%13U8VOQAqLFnDhkwlxdoBaM-5<dKRnuA_pliD>&]9In3}%Gl<[');
define('NONCE_KEY',        '(]5s#;k.60-,>|j~1}N2NT8)kXv%bN08%JLFt(#u{D$@-<1ISg|_c:rs#fzwBLCM');
define('AUTH_SALT',        'PuW59$x6$!I<rrL(H$M)+XfspS>KHHGWH`SDiR=dVK@+i(]HH0zx4%S24HV<s-/D');
define('SECURE_AUTH_SALT', '3dcL;?!EcyPc-PKo#D#I((B]Y B^gD/6$u{TD)7zMdO$0<S89PUFda^%Y;fYZXBU');
define('LOGGED_IN_SALT',   '74Ojm(nzt]qpSf._-&$m^Y)Eq}X1fzC- e` TW@: }creR9QF8r-YtBY]+g?$?9g');
define('NONCE_SALT',       '<DF-hLX+,lh$p0|>@<OgQz wi4JYoi- @~PBF1aR/vT&qaAfkdQ{~R~][/G~[fEn');
define( 'ALLOW_UNFILTERED_UPLOADS', true );
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
