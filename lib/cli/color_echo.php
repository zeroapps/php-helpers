<?php

/**
 * Outputs colored message into CLI.
 * You can specify text and/or background color.
 *
 * @param string $message text to output
 * @param string $text_color (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'
 * @param string $bg_color (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'
 */
 
function color_echo($message, $text_color = 'green', $bg_color = 'black') {
  static $clr_indexes = [
    0 => 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray',
    60 => 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'
  ];
  
  $text_code = array_search($text_color, $clr_indexes) + 30;
  $bg_code = array_search($bg_color, $clr_indexes) + 40;
  
  echo "\e[{$text_code};{$bg_code}m" .
       $message .
       "\e[0m";
}