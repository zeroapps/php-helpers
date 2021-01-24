<?php

$general_description =
  '# php-helpers' . "\n\n" .
  'This is a collection of all kind of php helper functions.' . "\n\n";



function collect_docs($dir = null) {
  $root = __DIR__ . '/lib';
  if ( !$dir ) $dir = $root;
  
  $docs = '';
  
  foreach ( glob($dir . '/*') as $node ) {
    if ( is_dir($node) ) {
      $docs .= '## ' . ucfirst(basename($node)) . ' functions' . "\n";
      $docs .= collect_docs($node);
    }
    else {
      $code = file_get_contents($node);
      
      $m = [];
      preg_match('/function (.+) \{/', $code, $m);
      $function = $m[1];
      $function = preg_replace('/ = .+?,/', ',', $function);
      $function = preg_replace('/ = .+?\)/', ')', $function);
      
      $m = [];
      preg_match_all('/ \* (.+)/', $code, $m);
      $description = '';
      $params = '';
      $example = '';
      foreach ( $m[1] as $line ) {
        if ( substr($line, 0, 1) == '@' ) {
          $params .= ' - ' . preg_replace('/(\$[a-z0-9_]+)/', '**$1**', str_replace('@param', '', $line)) . "\n";
        }
        else if ( substr($line, 0, 6) == '<code>' ) {
          $example = '```<?php' . "\n";
        }
        else if ( substr($line, 0, 7) == '</code>' ) {
          $example .= '';
        }
        else {
          if ( $example ) {
            $example .= $line . "\n";
          }
          else {
            $description .= $line . "\n";
          }
        }
      }
      
      if ( $example ) {
        $example .= '```' . "\n\n";
      }
      
      $docs .= '### ' . $function . "\n" .
               $description . "\n" .
               $example .
               $params .
               "\n\n";
    }
  }
  
  return $docs;
}



$readme = $general_description . collect_docs();
# echo $readme;
file_put_contents('README.md', $readme);