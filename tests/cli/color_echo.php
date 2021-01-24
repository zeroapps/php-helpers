<?php


ob_start();
color_echo('test', 'black', 'light_green');
$output = ob_get_clean();



return [
  
  [
    $output == "\e[30;102m" . 'test' . "\e[0m",
    'wrong color combination of printed string'
  ]
  
];