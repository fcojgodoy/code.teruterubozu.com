<?php

namespace Roots\Sage\Userfields;

/**
 * Add address field for users
 */
function modify_contact_methods($profile_fields) {

	// Add new fields
  $profile_fields['city'] = __('Where you are?', 'teruterubozu');

	$profile_fields['twitter'] = __('Twitter Username', 'teruterubozu');
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['gplus'] = 'Google+ URL';

	return $profile_fields;
}
add_filter('user_contactmethods', __NAMESPACE__ . '\\modify_contact_methods');
