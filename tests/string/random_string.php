<?php return [
  
  [
    strlen(random_string(16)) == 16,
    'generated string is of wrong length'
  ],
  
  [
    random_string(3, 'a') == 'aaa',
    'generated string has wrong symbols'
  ]

];