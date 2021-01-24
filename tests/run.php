<?php


# Simple test platform


# fetch all tests
function run_all_tests($dir = null) {
  if ( !$dir ) $dir = __DIR__;
  
  foreach ( glob($dir . '/*') as $node ) {
    if ( is_dir($node) ) {
      run_all_tests($node);
    }
    else {
      $file = str_replace(__DIR__, '', $node);
      if ( $file != '/run.php' ) {
        $tests = include $node;
        echo basename($file) . "\n";
        foreach ( $tests as $test ) {
          if ( $test[0] ) {
            echo "\e[92m" . '+' . ' ' . 'passed' . "\e[0m";
          }
          else {
            echo "\e[31m" . '-' . ' ' . $test[1] . "\e[0m";
          }
          
          echo "\n";
        }
        
        echo "\n";
      }
    }
  }
}

# include all functions from lib
function load_all_functions($dir = null) {
  $root = __DIR__ . '/../lib';
  if ( !$dir ) $dir = $root;
  
  foreach ( glob($dir . '/*') as $node ) {
    is_dir($node) ? load_all_functions($node) : (include $node);
  }
}



# get all tests
load_all_functions();
run_all_tests();


table_echo([
  ['Name', 'Price', 'Rating'],
  ['Xiaomi phone', 'good', 'good'],
  ['Apple phone', 'awful', 'great'],
  ['Nokia', 'not available', 'not available']
]);