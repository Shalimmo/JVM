<?php
/** 
 * Configuración básica de WordPress.
 */
//increase WP Memory Limit    
define('WP_MEMORY_LIMIT', '256M');
/* Datos localhost */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/jmvillas/public_html/wp/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'jmvillas_villasWp_1');
define('DB_USER', 'jmvillas_Wp_1');
define('DB_PASSWORD', 'A@vNagW7WhuZ');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/* Datos final 
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
*/
/**#@+
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 */
define('AUTH_KEY',         'd+L~.1jHBZMxE?E=AUq&]3f)u, xtg>d0aDJ>3+FKhPJw=onOiVj<9Kie?.pTv-Y');
define('SECURE_AUTH_KEY',  'TWkXk)lJ+DLr<S9Fkg%?e;hrcFgA|9=f7dn@rl-<U67$VXk_~V?p^972hG`c+;#7');
define('LOGGED_IN_KEY',    ']PH %-X2FZ)Q~FFdi818b6u3vfIkQX,?XDfna|`i84zOZ 2 N}F{5m$_)A8}~lhm');
define('NONCE_KEY',        'Z];FYI+PUjihk|-aU;4I*Yv-M+TWeit3s|(+m[ViCc~!w0v[Ki{+LY)5)](VHg<{');
define('AUTH_SALT',        ';exRU6kml[~p}>XW)W1Y6!U}h/Qa>6]hWl.ik1g!#B}|?k>/7e%~./>CtKC?eI)q');
define('SECURE_AUTH_SALT', 'Y(^S>R,bJTMgiHr-lM!<x7r71>}tBjorxY?&Xd-FB6s8>p:D.r}fK[6Up9 SGL?;');
define('LOGGED_IN_SALT',   'xr6I 0|B]UH!F.j<r)v{p<vo+6!$>Z$~Xzb]:9#-2NZveBR3V8IG+=M2G@|LHM}D');
define('NONCE_SALT',       'psg0eBqo/J||0V5h0,j=^6<E6nwz<f2$#+MSZ<.8&cD;FOc6+{4o.m<Uqu4)?r4-');


$table_prefix  = 'jmv1_';

define('ALLOW_UNFILTERED_UPLOADS', true);
define('WP_DEBUG', false);

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Dejar esto sólo en local
// para permitir las actualizaciones de plugins.
// Importante!!
define('FS_METHOD','direct');
//Disable File Edits