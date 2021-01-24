<?php

/**
 * Redirect to a given URL
 * 
  * <code>
 * # redirect browser to google
 * redirect('https://google.com/');
 * </code>
 *
 * @param string $url absolute or relative url to redirect to
 * @param string $code (optional) HTTP type of redirect (301 or 302)
 */

function redirect($url, $code = 302) {
  header('Location: ' . $url, true, $code);
  exit;
}