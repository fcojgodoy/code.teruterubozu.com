<?php
/*
Plugin Name: Bozu User Contact Methods
Plugin URI:  https://github.com/fcojgodoy/
Description: Add custom contact methods on a user's profile page.
Version:     0.0.1-dev
Author:      fcojgodoy
Author URI:  https://github.com/fcojgodoy/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bozuucm
Domain Path: /languages

Bozu User Contact Methods is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Bozu User Contact Methods is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Bozu User Contact Methods. If not, see https://github.com/fcojgodoy/.

*/
// FIXME: URIs de plugin, de licencia (2), namings

// Define custom fields
$extra_fields =  array(
	// array( 'facebook', __( 'Facebook Username', 'bozuucm' ), true ),
	// array( 'twitter', __( 'Twitter Username', 'bozuucm' ), true ),
	// array( 'googleplus', __( 'Google+ ID', 'bozuucm' ), true ),
	// array( 'linkedin', __( 'Linked In ID', 'bozuucm' ), false ),
	// array( 'pinterest', __( 'Pinterest Username', 'bozuucm' ), false ),
	// array( 'wordpress', __( 'WordPress.org Username', 'bozuucm' ), false ),
	// array( 'phone', __( 'Phone Number', 'bozuucm' ), true ),
  array( 'city', __( 'Your location', 'bozuucm' ), true )
);

// Use the user_contactmethods to add new fields
add_filter( 'user_contactmethods', 'bozuucm_add_user_contactmethods' );

/**
 * Add custom users custom contact methods
 *
 * @access      public
 * @since       0.1
 * @return      void
*/
function bozuucm_add_user_contactmethods( $user_contactmethods ) {

	// Get fields
	global $extra_fields;

	// Display each fields
	foreach( $extra_fields as $field ) {
		if ( !isset( $contactmethods[ $field[0] ] ) )
    		$user_contactmethods[ $field[0] ] = $field[1];
	}

    // Returns the contact methods
    return $user_contactmethods;
}

?>
