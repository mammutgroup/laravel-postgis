<?php namespace Schema;

use BaseTestCase;
use Mockery;
use Mammutgroup\LaravelPostgis\PostgisConnection;
use Mammutgroup\LaravelPostgis\Schema\Builder;
use Mammutgroup\LaravelPostgis\Schema\Blueprint;

class BuilderTest extends BaseTestCase
{
    public function testReturnsCorrectBlueprint()
    {
        $connection = Mockery::mock(PostgisConnection::class);
        $connection->shouldReceive('getSchemaGrammar')->once()->andReturn(null);

        $mock = Mockery::mock(Builder::class, [$connection]);
        $mock->makePartial()->shouldAllowMockingProtectedMethods();
        $blueprint = $mock->createBlueprint('test', function () {
        });

        $this->assertInstanceOf(Blueprint::class, $blueprint);
    }
}
