<?php

/**
 * Generates random string that looks like name, handy for creating test users.
 * 
  * <code>
 * # get random first name
 * random_name(); # "Wesa"
 * 
 * # get random first and last name
 * random_name(true); # "Hybe Tolokyxi"
 * </code>
 *
 * @param bool $include_last_name should last name be also generated
 */
 
function random_name($include_last_name = false) {
  $chars = 'bcdfghjklmnpqrstvwxz';
  $co_chars = 'aeiouy';
  
  
  $result = [''];
  if ( $include_last_name ) {
    $result[] = '';
  }
  
  foreach ( $result as $k => $name ) {
    $length = mt_rand(4 * ($k + 1 ), 8 * ($k + 1));
    
    for ( $i = 0; $i < $length; $i++ ) {
      $name .= ($i % 2) ? $co_chars[rand(0, strlen($co_chars) - 1)] : $chars[rand(0, strlen($chars) - 1)];
    }
    
    $result[$k] = ucfirst($name);
  }
  
  return implode(' ', $result);
}