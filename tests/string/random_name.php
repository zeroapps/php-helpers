<?php return [
  
  [
    strpos(random_name(true),' ') !== false,
    'last name not generated'
  ],
  
  [
    strlen(random_name()) > 0,
    'name not generated'
  ]

];