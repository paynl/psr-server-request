<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

if (function_exists('create_psr_server_request') === false) {
    function create_psr_server_request(): ServerRequestInterface
    {
        $psr17Factory = new Psr17Factory();
        $serverRequestCreator = new ServerRequestCreator(
            $psr17Factory,
            $psr17Factory,
            $psr17Factory,
            $psr17Factory,
        );

        $serverRequest = $serverRequestCreator->fromGlobals();

        // This is to mitigate a bug in the ServerRequestCreator where it sets the Host header twice.
        // Once this is fixed within the ServerRequestCreator this mitigation becomes obsolete
        // @see https://github.com/Nyholm/psr7-server/issues/48
        // @see https://github.com/Nyholm/psr7-server/pull/49
        if ($serverRequest->hasHeader('Host')) {
            $serverRequest = $serverRequest->withHeader('Host', $serverRequest->getHeader('Host')[0]);
        }

        return $serverRequest;
    }
}
