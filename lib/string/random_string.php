<?php

/**
 * Generates random string from given set of symbols.
 * By default symbols are [0...9a-zA-Z]
 * 
  * <code>
 * # get random alphanumeric string of 16 characters
 * random_string(16);
 * </code>
 *
 * @param int $length size of generated string
 * @param string $characters (optional) set of symbols to generate a string from
 */
 
function random_string($length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
  $width = strlen($characters);
  $result = '';
  
  for ( $i = 0; $i < $length; $i++ ) {
    $result .= $characters[rand(0, $width - 1)];
  }
  
  return $result;
}