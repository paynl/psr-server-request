<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

final class ServerRequestTest extends TestCase
{
    public function testItCanCreateARequest(): RequestInterface
    {
        $_SERVER['HTTP_HOST'] = 'hostname.com';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = create_psr_server_request();

        $this->assertInstanceOf(RequestInterface::class, $request);

        return $request;
    }

    /** @depends testItCanCreateARequest */
    public function testItHasOnlyOneHostHeader(RequestInterface $request): void
    {
        $this->assertCount(1, $request->getHeader('Host'));
        $this->assertEquals('hostname.com', $request->getHeaderLine('Host'));
    }
}