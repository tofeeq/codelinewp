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
define('DB_NAME', 'codelinewp');

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
define('AUTH_KEY',         'hN`yJ7^,R|F=8~!TG$B Z)rb?a`.m0N`:&llh!Y+!7UheAhNZ~0Ml>4}yJY#GOEG');
define('SECURE_AUTH_KEY',  '>(cO&`S#n D+[r>=D(fd@4@Ko:KV?<u>/NTwR)LtC_NGqO#7s!GYOm-P>Tl1DB{)');
define('LOGGED_IN_KEY',    'k=bmaE3C!@0s/2|NxmwbKSvx=D0SsB/2E{Dkem8K;>@Q`|7a^M0Hyl.-z@0okY6_');
define('NONCE_KEY',        ']5j}$aE%IW_=Y $_.TQXn3u)<y9:T}x2]I?))xdPUDQa 1ZWWE|:KTMXGm5+qgr8');
define('AUTH_SALT',        'd3X).0a?xu{ND-z.~p|^dG9rT$8V6j75NY{|br*8%N@@rgComw-xbHGbIT<Vz:Lt');
define('SECURE_AUTH_SALT', '1AH+[VD|W?t8=cK5&40h@R7s:9zRgjX?g.Nfv4QM*Q :j?yb.X+b-?c81h.rQIBx');
define('LOGGED_IN_SALT',   'K8Q9yKaT@yz-sq~33r@d,7]- `|~]TYlZ0aiB` sAw=JtXI&ezk~WvRrZPYobpQc');
define('NONCE_SALT',       'AygGeF)ka3=E?<O#I3A1hH;:Gs;yfXrwot6Z}8UJD*pv4>r~#:H1][91RxskG@<>');

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
