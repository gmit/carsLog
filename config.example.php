<?php
/**
 * Custom carsLog configurations.
 *
 * This file has the following configurations: MySQL settings, Table Prefix, Secret Keys, Language, ABSPATH and more.
 * The file is based on GenerateWP.com template
 * 
 * @package carsLog
 */


/* MySQL settings */
define( 'DB_NAME',     'database_name_here' );
define( 'DB_USER',     'username_here' );
define( 'DB_PASSWORD', 'password_here' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );


/* MySQL database table prefix. */
$table_prefix = 'cl_';


/* Authentication Unique Keys and Salts. */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );


/*  Localized Language. */
define( 'LANG', '' );

/* Path to the site for the phpqrcode class */
define( 'BASE_URL',  'link to your site');

/* Absolute path to the root directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
