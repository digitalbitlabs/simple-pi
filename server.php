<?php
/**
 * SimplePi Framework
 * This code is derived from Laravel framework - Used to render index.php if relative path is used
 * @author   Sanket Raut @sanketraut
 */

$uri = urldecode(
    parse_url(filter_input(INPUT_SERVER,'REQUEST_URI'), PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
