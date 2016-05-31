<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'gamechat');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', '');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8mb4');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QvF0NHQou3d^*h+1[k;o!<cLMVfuZXq]zBduIBl.~t&Aa2oswHKF*d(W@@(#T}a6');
define('SECURE_AUTH_KEY',  'gaWm!xBb#?`vY9bHsYuU_LZGs`JytqZ0INUK%1L,F$yVF<Mro6O*9,MHgHT@y%bY');
define('LOGGED_IN_KEY',    'u+a$GY5??E;YU7PV`c^oNorb7:,^y~E!JGFK@B^vKB&wKqVWZL55MQ0u>Kx#c*|h');
define('NONCE_KEY',        '{6j^ZU+3O)Q4ii2Ju3_>KtG|]KjxH^)r~<QgkRErZ,J?uow|VzMz;k*L9|wVH>EQ');
define('AUTH_SALT',        'rbR2y;C)isW.%apLEa,:I*:iMIW7U 7:vatk:oWO{**ct6B6#XV),;!(]oj%YN9p');
define('SECURE_AUTH_SALT', '>z:HWY0t~E{I96mgrs{UaQfJV=LSH7:Xf)#p{zlsC/-5,_gC9s^;%a Y[7`&Y.&p');
define('LOGGED_IN_SALT',   '?z4wZ>~e.hQ01PB) m(^YZ=H:uyCfi=#LQ %YxX-/ppp$G}g-pl|>BqZ6gkd_.Ww');
define('NONCE_SALT',       '%tDrR*-c$Nz(PpUw**p6S)B2aCjIy}rV{{<4g6(DxtjcFR=wg!hZtl&,`h(mfQ_$');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');