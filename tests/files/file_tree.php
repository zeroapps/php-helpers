<?php

exec('rm -rf /tmp/tree');
mkdir('/tmp/tree');
mkdir('/tmp/tree/folder');
file_put_contents('/tmp/tree/folder/file1.txt', '');
file_put_contents('/tmp/tree/image2.png', '');

$tree_json = json_encode(file_tree('/tmp/tree'));
print_r(json_encode(file_tree('/tmp/tree'), JSON_PRETTY_PRINT));


return [
  
  [
    $tree_json == '{"\/tmp\/tree\/folder":{"\/tmp\/tree\/folder\/file1.txt":null},"\/tmp\/tree\/image2.png":null}',
    'files tree is wrong'
  ],
  
];