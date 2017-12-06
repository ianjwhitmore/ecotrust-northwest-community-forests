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
define('DB_NAME', 'db27819_ecotrust_nwf');

/** MySQL database username */
define('DB_USER', 'db27819_ecotrust');

/** MySQL database password */
define('DB_PASSWORD', 'g!0yqOw!?9G');

/** MySQL hostname */
define('DB_HOST', 'internal-db.s27819.gridserver.com');

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
define('AUTH_KEY',         'xDm}Rcr|yD|A<LkC)13rHFy!5q(M]CYvv0utYWwxgwc[ I#Y~HMpLr#;[bl|hd0F');
define('SECURE_AUTH_KEY',  '=>EnE|&=D={whAPq<OP4^vH~I@jJx~*5$KAI_z(ku[Ga/X{3.g!L/I)H)|SMAZ[B');
define('LOGGED_IN_KEY',    'd/N5D,Q%#mnliP3LEi[hImV*x}54j`RF`W=^uN!^qa8KzVn{pS}v0Gu{XY o>/dR');
define('NONCE_KEY',        'YymfmCr0| !%2JO-C#`13^U?Q} SE!niPHfM-=P4)5YY_=kbc~`3=as6+~(Rf)tc');
define('AUTH_SALT',        'c^MwIwF^`6HZ4ov.u9cQd-s6n,R?TbI=8d,Chgi_>FyRlt5T,y6BCD<Ejz_v9=Gk');
define('SECURE_AUTH_SALT', '+SQD[Qz?-]xKT,W=bvW:4Xy6FGRvEJRDH7;+.0E}d!1.xrw{$.WP:nR yQD&EyQQ');
define('LOGGED_IN_SALT',   'Av9o}i2-!FS%%?`=C&~VjY^-aT(PvpO~]1<Af1r^0`UOQhBRFx?n|tk$xCt9JUi,');
define('NONCE_SALT',       '3IuyS+JO;xOqG_giXB#|#4d2,*<GD~YiMc3/4dBrfnzw4)j(;6aP;VB|%RqB9k5w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_nwf_';

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
