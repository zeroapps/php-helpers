<?php return [
  
  [
    json_encode(csv_to_array("1,2\n3,4")) == '[["1","2"],["3","4"]]',
    'CSV string parse error'
  ],
  
  [
    json_encode(csv_to_array("1;2\n3;4", ';')) == '[["1","2"],["3","4"]]',
    'CSV string parse error'
  ]
];