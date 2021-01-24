# php-helpers

This is a collection of all kind of php helper functions.

## Cli functions
### color_echo($message, $text_color, $bg_color)
Outputs colored message into CLI.
You can specify text and/or background color.

```<?php
# print green text on white background
color_echo('Hi', 'green', 'white');

```

 -  string **$message** text to output
 -  string **$text_color** (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'
 -  string **$bg_color** (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'


## String functions
### random_string($length, $characters)
Generates random string from given set of symbols.
By default symbols are [0...9a-zA-Z]

```<?php
# get random alphanumeric string of 16 characters
random_string(16);

```

 -  int **$length** size of generated string
 -  string **$characters** (optional) set of symbols to generate a string from


