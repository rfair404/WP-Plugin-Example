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

define('WP_SITEURL', 'http://localhost/wp');
define('WP_HOME', 'http://localhost');
define('WP_CONTENT_DIR', __DIR__ . '/custom-content/' );
define('WP_CONTENT_URL', 'http://localhost/custom-content/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', 'db');

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
define('AUTH_KEY',         '0y56l#}xn^wEhL?>n)=||ob#z>UAV^4Ruq{eg7E2M%9|)%lBtX1[4K*/s^SkVJ#2');
define('SECURE_AUTH_KEY',  '~R,O|S6t]R,n<Ar<[(}^;EiNZ*aW*j @/onfA^K$ALg.JYZwVMO!4o61l=?+cQf]');
define('LOGGED_IN_KEY',    '@NP% opX~B3EhWMg5&WlyzlA+eRd59.LVd=|Nm~o0aUfbBMKL:<G?2%/5lCj`),$');
define('NONCE_KEY',        '[n#O{3W/l&F$to_vrv9<V=yn0B{vlcnu5Xclt1[#RgZc4c_mX#OImai-NKe~}gu7');
define('AUTH_SALT',        'qz3,IyI%SH|u|}YXoJ|!i-*U7e1bI[^w5C7Qn;Db<S5z4B<L:vsg}Ydx| B87CT4');
define('SECURE_AUTH_SALT', '6C*/?SD32^kV2xROPAO7c%9{,4GtK%Hfky{#_f`mfY5XIVhfklestT|9TT*:MeL+');
define('LOGGED_IN_SALT',   'c@in kIgL#9g<kq>Pu?HVQ8p`y1xJ:(&qJqFzGZPSKLgY;+s3j}@BM|._lDV6K:L');
define('NONCE_SALT',       'c/l+5HYSy^Q>$P>D!jxt@45#3+gSy#T/) em404u)V`Cj[78l8E]$`;<R;`s0!.C');

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
