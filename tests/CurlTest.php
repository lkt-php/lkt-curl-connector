<?php

namespace Lkt\CurlConnectors\Tests;

use Lkt\CurlConnectors\CurlConnections;
use Lkt\CurlConnectors\CurlConnector;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    public function test_connection()
    {
        $conn = CurlConnector::define('test')
            ->setHost('localhost')
            ->setUser('')
            ->setPassword('');

        CurlConnections::set($conn);

        $r = $conn->query('/test', [
            'prop' => 'lorem',
        ]);
    }
}