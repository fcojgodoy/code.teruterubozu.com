#!/bin/sh
#
# WP Test - WP-CLI Quick Install Script
# http://wptest.io/
#
# Note: This script assumes you have wp-cli installed.
#####################################################################################

# Ask user where WordPress is installed.
printf "Please provide the local path to your WordPress install: "
read WPPATH

# Import WP Test data.
cd $WPPATH
# curl -OL https://raw.githubusercontent.com/manovotny/wptest/master/wptest.xml
curl -OL https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml
wp plugin activate wordpress-importer
wp import theme-unit-test-data.xml --authors=create
rm theme-unit-test-data.xml

# Update wp options
# https://codex.wordpress.org/Theme_Unit_Test#WordPress_Settings
wp option update blogname 'Title to something fairly long according to Theme Unit Test'
wp option update blogdescription 'Setting the Tagline to something even longer. These settings will facilitate testing how the Theme handles these values.'
wp option update posts_per_page  5
wp option update thread_comments 1
wp option update thread_comments_depth 5
wp option update comments_per_page 5
wp rewrite structure '/%year%/%monthnum%/%postname%'

# pagesid="$(wp post list --post_type=page --field=ID)"
# echo $pagesid
# wp menu item add-post long-menu $pagesid
