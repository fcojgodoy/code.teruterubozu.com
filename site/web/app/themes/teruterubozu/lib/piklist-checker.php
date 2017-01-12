<?php

namespace Roots\Sage\Piklist;

use Roots\Sage\Piklist;

/*
 * Add Piklist Checker
 * https://piklist.com/learn/doc/piklist-checker/
 */

function add_piklist_checker(){
  if(is_admin()){
    include_once('class-piklist-checker.php');

    if (!__NAMESPACE__ . '\\piklist_checker'::check(__FILE__, 'teruterubozu')){
      return;
    }
  }
}
add_action('init', __NAMESPACE__ . '\\add_piklist_checker');
