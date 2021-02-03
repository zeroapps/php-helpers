<?php

/**
 * Parses string as set of CSV lines and returned 2-dimensional array
 * 
 * <code>
 * 
 * csv_to_array("1,2\n3,4\n,5,6");
 * 
 * </code>
 *
 * @param String $text CSV data in text format
 * @param String $separator Set the field delimiter (one character only).
 * @param String $enclosure Set the field enclosure character (one character only).
 * @param String $escape Set the escape character (at most one character).
 */
 
function csv_to_array($text, $separator = ',' , $enclosure = "\"" , $escape = '\\') {
  return array_map(function($element) use ($separator, $enclosure, $escape) {
    return str_getcsv($element, $separator, $enclosure, $escape);
  }, explode("\n", trim($text)));
}