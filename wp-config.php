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
define('DB_NAME', 'patrickwebdesign');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'h]2`He&$$|ATA6_X2dAniS:G#|%VAWle(V3(_;~5/a|eKXhRnIc;TR1g1QBu1CDC');
define('SECURE_AUTH_KEY',  'coZytJlsR#2c=!eWEn3[Lk*3fgrovHl =avQ6v?:=Bb9=c?0uU`zE >[CmTCnQFh');
define('LOGGED_IN_KEY',    'jv:meI15e3qcp3SsZL_5[]3Bs6<{?UWW#*DNipXWa.z@zy*32.3!hADQ=u$wL.w=');
define('NONCE_KEY',        'aHKk1q{-0<]H^*-+rhCV-DUH}S3QvT5y*dr/kfVa?id>o 4F{+pVVg%D_^Mu-pg1');
define('AUTH_SALT',        '`M@ngIQkz>bllv+1<Tx`>?ZG>v=<A,V}9$HY=s$g!CaK3ZZmr/_2o;/rlC-I@%oY');
define('SECURE_AUTH_SALT', '0u55*:[%|;iTHuv/}Ylggpb|K!wUVrH?OkptA_jq$>R)-h2v?t_Ywo7*1v_9ocZN');
define('LOGGED_IN_SALT',   'dFY]VV0SUa-:y.f[S,[9PW|jxf^sx1ee>!{f(,T7JYNCxXTHMZ6HX<ea+X;;7gxT');
define('NONCE_SALT',       'L9%$30t>M!HjlG!S=S|0IB^GwM-b]F^1$iht_NNF#8Ktj_Tb|I_@tb_>G)N1~&t1');

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
