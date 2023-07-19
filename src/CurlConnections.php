<?php

namespace Lkt\CurlConnectors;

class CurlConnections
{
    /** @var CurlConnector[] */
    protected static array $connectors = [];
    public static string $defaultConnector = 'default';

    public static function setDefaultConnector(string $name): void
    {
        static::$defaultConnector = $name;
    }

    public static function set(CurlConnector $connector): void
    {
        if (isset(static::$connectors[$connector->getName()])) {
            throw new \Exception("Invalid Connector Name: Connector name already in use ('{$connector->getName()}')");
        }
        static::$connectors[$connector->getName()] = $connector;
    }

    public static function get(string $name): CurlConnector
    {
        if (!isset(static::$connectors[$name])) {
            throw new \Exception("Connector '{$name}' doesn't exists");
        }
        return static::$connectors[$name];
    }

    public static function getDefaultConnector(): CurlConnector
    {
        $name = static::$defaultConnector;
        if (!isset(static::$connectors[$name])) {
            throw new \Exception("Connector '{$name}' doesn't exists");
        }
        return static::$connectors[$name];
    }

    /**
     * @return CurlConnector[]
     */
    public static function getAllConnectors(): array
    {
        return static::$connectors;
    }
}