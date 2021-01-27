# php-helpers

This is a collection of all kind of php helper functions.


# Cli functions
## [color_echo($message, $text_color, $bg_color)](lib/cli/color_echo.php)
Outputs colored message into CLI.
You can specify text and/or background color.

```<?php
# print green text on white background
color_echo('Hi', 'green', 'white');
```

 -  string **$message** text to output
 -  string **$text_color** (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'
 -  string **$bg_color** (optional) one of: 'black', 'red', 'green', 'yellow', 'blue', 'magenta', 'cyan', 'light_gray', 'dark_gray', 'light_red', 'light_green', 'light_yellow', 'light_blue', 'light_magenta', 'light_cyan', 'white'


## [table_echo($table)](lib/cli/table_echo.php)
Outputs 2-dimensional array as formatted table into CLI.

```<?php
table_echo([
  ['Name', 'Price', 'Rating'],
  ['Xiaomi phone', 'good', 'good'],
  ['Apple phone', 'awful', 'great'],
  ['Nokia', 'not available', 'not available']
]);
# --------------------------------------------------
# | Name           | Price         | Rating        |
# --------------------------------------------------
# | Xiaomi phone   | good          | good          |
# --------------------------------------------------
# | Apple phone    | awful         | great         |
# --------------------------------------------------
# | Nokia          | not available | not available |
# --------------------------------------------------
```

 -  array **$table** which is going to be outputted as table



# Db functions
## [cache($key, $value, $ttl)](lib/db/cache.php)
Single function cache implementation based on files (located in /tmp folder)

```<?php
# cache "12" value in "test" key
cache('test', "12");
# get cached data by "test" key
cache('test');
# get cached data by "test" key using 60 seconds ttl
cache('test', null, 60);
```

 -  string **$key** get data by this key from cache
 -  string **$value** (optional) if this is not null, **$value** will be stored to **$key** cache
 -  int **$ttl** (optional) specifies expiration in seconds (used only while reading data)



# Files functions
## [file_tree($dir)](lib/files/file_tree.php)
Get list of files/dirs inside a specified dir and return it as array

```<?php
$tree = file_tree('/tmp/tree'); # some folder to build a tree from
echo json_encode($tree, JSON_PRETTY_PRINT);
#  {
#  }
```

 -  string **$dir** directory to buld a tree from



# String functions
## [random_name($include_last_name)](lib/string/random_name.php)
Generates random string that looks like name, handy for creating test users.

```<?php
# get random first name
random_name(); # "Wesa"
# get random first and last name
random_name(true); # "Hybe Tolokyxi"
```

 -  bool **$include_last_name** should last name be also generated


## [random_string($length, $characters)](lib/string/random_string.php)
Generates random string from given set of symbols.
By default symbols are [0...9a-zA-Z]

```<?php
# get random alphanumeric string of 16 characters
random_string(16);
```

 -  int **$length** size of generated string
 -  string **$characters** (optional) set of symbols to generate a string from



# Web functions
## [go_back()](lib/web/go_back.php)
Redirect to a previous (referrer) page



## [redirect($url, $code)](lib/web/redirect.php)
Redirect to a given URL

```<?php
# redirect browser to google
redirect('https://google.com/');
```

 -  string **$url** absolute or relative url to redirect to
 -  string **$code** (optional) HTTP type of redirect (301 or 302)


