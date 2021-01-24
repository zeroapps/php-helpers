<?php

$set_result = cache('test', '1');
$get_result = cache('test');
sleep(2);
$get_expired_result = cache('test', null, 1);

return [
  
  [
    $set_result == '1',
    'cache set failed'
  ],
  
  [
    $get_result == '1',
    'cache get failed'
  ],
  
  [
    $get_expired_result === null,
    'cache expiration failed'
  ]
  
];