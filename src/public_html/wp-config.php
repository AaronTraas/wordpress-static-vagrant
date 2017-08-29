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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'mysqlpassword');

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
define('AUTH_KEY',         '<9oVE1-SC1 =} (WAVn1VJ.je; ;lzA09:Y-aB:d}$nT[FPFX)-KZ>pNd35Z?c6%');
define('SECURE_AUTH_KEY',  'sch63)j2i/;GT1F@,l[1M<eC{T~I&bp>bQuMoq }m$b7n~tbbj|eaw0Fw:^+*yj9');
define('LOGGED_IN_KEY',    'XUAC3T_v~8e9A*veb3JQYS<NIfV:H1o@hum&*U <rQUw_sZI5,K*L/7pw+:j {NA');
define('NONCE_KEY',        'MI=L+ysF-#-f8e:O>J(4_@6yF}IR[k~-3L|$5P-2]z%I2V}%}7BIec MA+|^;^ED');
define('AUTH_SALT',        '<Weo^YO*dysm7WY5kqm1EJ,-r6RQ7T5=_evReHJF6jK#-gs|~:28gdAD@A>9Z+B>');
define('SECURE_AUTH_SALT', 'aZ/6zD!7cBV{28%HFpfG}<M-v-%=IBM>fkwCS;A10t8ORb~kWzL)Nk$Ok]ahU=Y)');
define('LOGGED_IN_SALT',   '{LZ}%V;Ea>QR GNITNdHn[+$_HWU9H{c%Sit{qjW7]doAItVEncZ~j6PjD[W7n!]');
define('NONCE_SALT',       '9`7V`,/ai6+tJ~OA.fQG.XaA:3wZu5*(=h ?nuqVy@,|.L6b}VLsDYSCeP[*)d{y');

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
