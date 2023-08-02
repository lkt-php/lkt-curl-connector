<?php

namespace Lkt\Connectors\Tests;

use Lkt\Connectors\CurlConnector;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    public function test_connection()
    {
        $conn = CurlConnector::define('test')
            ->setHost('localhost')
            ->setUser('')
            ->setPassword('');

        $r = $conn->query('/test', [
            'prop' => 'lorem',
        ]);
    }
}