<?php
   /*
   Plugin Name: DarkMatter - Random Quotes & Sayings
   Plugin URI: http://darkmatter.seaverns.com
   description: Random Quotes & Sayings
   Version: 1.0
   Author: R. Seaverns
   Author URI: http://www.seaverns.com
   License: GPL2
   */

// Simple WordPress Plugin - Site Feature
// Generate Quote Of The Day

// Deny direct access to file.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Only do this when a single post is displayed
function darkmatter_random_quotes_and_sayings($content) {
 
// Only do this when a single post is displayed
if ( is_single() ) { 

// Display Errors ON
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuration
// File Locations
$quotelist = file("./wp-content/plugins/quote-of-the-day/quotes.txt");
$line = $quotelist[array_rand($quotelist)];
$quote = $line;
echo '<link rel="stylesheet" href="style.css">';
$content .= '<div align="center">'.$quote.'</div>';
}

// Return the content
return $content;
}
// Hook our function to WordPress the_content filter

add_filter('the_content', 'darkmatter_random_quotes_and_sayings');

