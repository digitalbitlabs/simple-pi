<?php declare(strict_types = 1);

/**
 * Environment variable rendering function
 */
if(!function_exists('env')) {
    function env($var) {
        return getenv($var);
    }
}
