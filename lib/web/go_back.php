<?php

/**
 * Redirect to a previous (referrer) page
 */

function go_back() {
  if ( $_SERVER['HTTP_REFERER'] ) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
}