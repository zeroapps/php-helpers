<?php

/**
 * Single function cache implementation based on files (located in /tmp folder)
 * 
 * <code>
 * # cache "12" value in "test" key
 * cache('test', "12");
 * 
 * # get cached data by "test" key
 * cache('test');
 * 
 * # get cached data by "test" key using 60 seconds ttl
 * cache('test', null, 60);
 * </code>
 *
 * @param string $key get data by this key from cache
 * @param string $value (optional) if this is not null, $value will be stored to $key cache
 * @param string $ttl (optional) specifies expiration in seconds (used only while reading data)
 */

function cache($key, $value = null, $ttl = 3600) {
  $key = md5($key);
  
  if ( $value !== null ) {
    $save = var_export($value, true);
    $save = str_replace('stdClass::__set_state', '(object)', $save);
    
    # save value to a file in a secure way
    $tmp = "/tmp/cache.$key." . uniqid('', true) . '.tmp';
    file_put_contents($tmp, '<?php return ' . $save . ';', LOCK_EX);
    rename($tmp, "/tmp/cache.$key");
  }
  else {
    $cache_file = "/tmp/cache.$key";
    if ( is_file($cache_file) && (time() - filemtime($cache_file) < $ttl) ) {
      # read from cache file
      $value = @include $cache_file;
    }
    else {
      # remove expired file
      @unlink($cache_file);
    }
  }
  
  return $value;
}