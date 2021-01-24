<?php

ob_start();
table_echo([ ['Name', 'Price'], ['Xiaomi', '8'] ]);
$output = ob_get_clean();

return [
  
  [
    $output == "-------------------\n| Name   | Price  |\n-------------------\n| Xiaomi | 8      |\n-------------------\n\n",
    'table is incorrect'
  ]
  
];