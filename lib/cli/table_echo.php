<?php

/**
 * Outputs 2-dimensional array as formatted table into CLI.
 * 
 * <code>
 * table_echo([
 *   ['Name', 'Price', 'Rating'],
 *   ['Xiaomi phone', 'good', 'good'],
 *   ['Apple phone', 'awful', 'great'],
 *   ['Nokia', 'not available', 'not available']
 * ]);
 * 
 * # --------------------------------------------------
 * # | Name           | Price         | Rating        |
 * # --------------------------------------------------
 * # | Xiaomi phone   | good          | good          |
 * # --------------------------------------------------
 * # | Apple phone    | awful         | great         |
 * # --------------------------------------------------
 * # | Nokia          | not available | not available |
 * # --------------------------------------------------
 * </code>
 *
 * @param array $table which is going to be outputted as table
 */
 
function table_echo($table) {
  
  # define max width for each column
  $col_width = [];
  foreach ( $table as $row => $data ) {
    foreach ( $data as $col => $value ) {
      $col_width[$col] = max(strlen($value), isset($col_width[$col]) ? $col_width[$col] : 0) + 1;
    }
  }
  
  # print table
  $line = str_repeat('-', array_sum($col_width) + count($col_width) * 2 + 1) . "\n";
  foreach ( $table as $row => $data ) {
    echo $line;
    foreach ( $data as $col => $value ) {
      echo '| ';
      echo str_pad($value, $col_width[$col]);
    }
    echo '|' . "\n";
  }
  echo $line . "\n";
}