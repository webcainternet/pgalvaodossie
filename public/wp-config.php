<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'comeati_dossie');

/** MySQL database username */
define('DB_USER', 'comeati_dossie');

/** MySQL database password */
define('DB_PASSWORD', 'f38ijHgFB');

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
define('AUTH_KEY',         '[3BJ#xwn]y`ts.%^k3*p&:YW{r-+<brpMU+m~$j=s<2O$|o6KJ9bzRz%>Qszg Ca');
define('SECURE_AUTH_KEY',  'H`cK&qyv%NA>V6SD f?ul(l^br!||[f+@Ti[RF%tJfzz&lxL])g?PzEG.Bh!YQW8');
define('LOGGED_IN_KEY',    'z,0_A1%<u(~F,H7nO&|#E=MEubYv$5_wM..D&nX*6<56mG{0Di)#eVD!bD!m|r+E');
define('NONCE_KEY',        '_$;@|M:N)@//1tL!b>~n`^G=`)1kr&GB<+NN~{~lSC3-X9Y45Ox[Ak!u}+d{d=?q');
define('AUTH_SALT',        'j c[4d+w|BgS,+p9~O2.aUvsa-?Eh+cia/=]DJ(O#(6VrO)*FLA2b|s5d-N&|o*E');
define('SECURE_AUTH_SALT', '-]49kb@1pcxIO:>r|hcZi:a,Y>s2~`TRdi6l{Fw09#^|B|Um)+i UOgRh>w-|G%_');
define('LOGGED_IN_SALT',   'RvpPEznmMt24g+Us!Q`5jmvmuq*Rc%KZZg*`S`R:p.@Q;O]()8^+_`}~2WorW4zu');
define('NONCE_SALT',       'ek^+BFdcdgk3403LOi|-x<s]1y`Y-!qrzTWcBPbv.xy!lMh SAe[GVH72Yz.[I9-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
