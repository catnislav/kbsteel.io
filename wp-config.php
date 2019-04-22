<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
define('DB_NAME', 'kb_steel');

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
define('AUTH_KEY',         '6WXgF7#RtLeb2C|7(2E)mDRM8#yb~L&(/<n_;ZL*/yX<|dEzxfn$Zraa[[)*3pjE');
define('SECURE_AUTH_KEY',  '6?&C2*6`l3Gyw*73vzAgW#F0Dpx+P.Z!Tb8yr|!+3I|&f`rQa8m^TUcZP+-S-mK,');
define('LOGGED_IN_KEY',    '`E/?e#*VCdfD`zDl)G/D826#>8h;PWe9O4R`R^}CyoTvIKM_7D$dR!eDJxz<|]M(');
define('NONCE_KEY',        ';x 7s{= _^JLoiSue6aEJjILTxe8|lf*, Wt~?Fsz]#nM8KJ>aZ[nJtA^h^3!3ir');
define('AUTH_SALT',        '8LmX3+9bO7n7)}PZ+f&3EF~q-4jw^pZO>Gr#8=Nl6_P8n{hWZ<j)sq*Abvu[4|=D');
define('SECURE_AUTH_SALT', '#%Sk7(^ Y^{akDRy0K ~UR&slp6rA[>QAY7-sHi<VQ]M|-`y*?Pv1{E-R#&g@`3g');
define('LOGGED_IN_SALT',   'LHOK>Gmv@e3Ct|~(:dp:Q&tE[9>k;8N?@DCYM8dWDMXTjgM9X4]5oix=kEH2QImT');
define('NONCE_SALT',       'QG2S~bx^x&6}4PWyZ-/*VF$iHP9)o#)Q904L4l*WKCd$#ut,[$R4Tu&UvUu<;@-#');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
