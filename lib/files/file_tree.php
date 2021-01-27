<?php

/**
 * Get list of files/dirs inside a specified dir and return it as array
 * 
 * <code>
 * $tree = file_tree('/tmp/tree'); # some folder to build a tree from
 * echo json_encode($tree, JSON_PRETTY_PRINT);
 * 
 * #  {
        "\/tmp\/tree\/folder": {
          "\/tmp\/tree\/folder\/file1.txt": null
        },
      "\/tmp\/tree\/image2.png": null
 * #  }
 *
 * </code>
 *
 * @param string $dir directory to buld a tree from
 */

function file_tree($dir) {
    $tree = [];
  
    foreach ( glob( $dir . '/*' ) as $file ) {
      if ( is_dir($file) ) {
        $tree[$file] = file_tree($file);
      }
      else {
        $tree[$file] = null;
      }
    }
  
    return $tree;
  }