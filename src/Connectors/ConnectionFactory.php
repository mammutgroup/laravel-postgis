<?php namespace Mammutgroup\LaravelPostgis\Connectors;

use PDO;
use Mammutgroup\LaravelPostgis\PostgisConnection;

class ConnectionFactory extends \Bosnadev\Database\Connectors\ConnectionFactory
{
    /**
     * @param string       $driver
     * @param \Closure|PDO $connection
     * @param string       $database
     * @param string       $prefix
     * @param array        $config
     * @return \Illuminate\Database\Connection|PostgisConnection
     */
    protected function createConnection($driver, $connection, $database, $prefix = '', array $config = [])
    {
        if ($driver === 'mysql') {
            return new PostgisConnection($connection, $database, $prefix, $config);
        }

        return parent::createConnection($driver, $connection, $database, $prefix, $config);
    }
}
