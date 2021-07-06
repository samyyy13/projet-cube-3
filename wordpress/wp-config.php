<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'XfYy?*Irx=I5}cl~%agHuK0D)dci@1N|.a8h%SsM!Ln])mc7M$%3HsASxl.dNGcE' );
define( 'SECURE_AUTH_KEY',  'yuTV,@~oo=9YRs-N6oZ!iQ}r1^c)uS~!C ]>*cle<bfh0m43!g>!x&FkVYjVsY,x' );
define( 'LOGGED_IN_KEY',    'Aq#RJ-mvY/M@)m.Y-_)`@L&F[8H),eHjtysXRr%#a-xKE0RIIWd!)$=rP!p(*ke(' );
define( 'NONCE_KEY',        'w2xt?gp ~IUSnjh>QIv-}`1;u=yF7,O $fix.G%D=o| WN^|0Y&V*A:E%-K$@#co' );
define( 'AUTH_SALT',        'aC#zA*9!d#ebzNkP*a:AHV99eZaP.Bln0^@<?$,)5XS=ic]j8b>NL?_igS;_]%yT' );
define( 'SECURE_AUTH_SALT', '6h7j5$$9m>Efln|Xc}Pa #L&JCAQ>NhQ!uuc!no.bg?bQm?4o 2},#CX.J&/Qw8}' );
define( 'LOGGED_IN_SALT',   '_ABGNq#yiVDg:#c{ajrdHm5A:?Q-YPe`P1/QvX&bVakOcSyL,N,!XclOxh<xBV(8' );
define( 'NONCE_SALT',       '%Xq5(!sAyR2/CN;jFVcry]$p;yhu[E0ggt&OBD[5zm>@zhl?fGb;?pK3TXrFWgMo' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
