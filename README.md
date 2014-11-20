macandcruise-theme
==================

INSTALLATION:

Put Wordpress file structure in desired directory.
Instead of running WP installation script, 
create database 'wp_macandcruise' (can be named differently) on server.

Do database dump from current test site.

Put MacAndCruise theme into wp-content/themes/MacAndCruise
Put uploads content into wp-content/uploads
Install the following plugins in wp-content/plugins (available at https://wordpress.org/plugins/)
	advanced-custom-fields
	custom-post-type-ui
	mailchimp-for-wp
	post-types-order

Edit wp-config.php to reflect database credentials
/** The name of the database for WordPress */
define('DB_NAME', 'wp_macandcruise');

/** MySQL database username */
define('DB_USER', 'REPLACE');

/** MySQL database password */
define('DB_PASSWORD', 'REPLACE');

/** MySQL hostname */
define('DB_HOST', 'REPLACE');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'macandcruise_';



Run the following SQL (replacing "REPLACE!!!" with your URL) on your database to set the site URL

UPDATE `macandcruise_options` SET `option_value` = 'REPLACE!!!' WHERE `option_name` = 'siteurl' OR `option_name` = 'home'



***** ISSUES *****

Some links in the navbar are set by WordPress, can be changed in admin panel

Separate pages are not loading properly - looking for work around...

