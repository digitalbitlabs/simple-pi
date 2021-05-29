<?php declare(strict_types = 1);

require __DIR__ ."/../vendor/autoload.php";

// register exception handler for Simple Pi
$handler = new \SimplePi\Exceptions\Handler();
$handler->handleException();

// Sample demo message to test response object and helper function
echo response()->json(['message'=>'simple pi is a beautiful micro framework'],400);

