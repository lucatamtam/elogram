<?php

namespace Instagram\Tests\Http\Clients;

use Instagram\Http\Clients\MockAdapter;
use Instagram\Tests\TestCase;
use Mockery as m;

class MockAdapterTest extends TestCase
{
    /**
     * @covers Instagram\Http\Clients\MockAdapter::__construct()
     * @covers Instagram\Http\Clients\MockAdapter::request()
     * @covers Instagram\Http\Clients\MockAdapter::mapRequestToFile()
     * @covers Instagram\Http\Clients\MockAdapter::mapRequestParameters()
     */
    public function testRequest()
    {
        $path = realpath(__DIR__.'/../../fixtures/').'/';
        $adapter = new MockAdapter($path);

        $expected = file_get_contents($path.'get_users_search.json');
        $actual = $adapter->request('GET', 'users/search');
        $this->assertJsonStringEqualsJsonString((string) $actual, $expected);
    }

    /**
     * @covers Instagram\Http\Clients\MockAdapter::__construct()
     * @covers Instagram\Http\Clients\MockAdapter::request()
     * @covers Instagram\Http\Clients\MockAdapter::mapRequestToFile()
     * @covers Instagram\Http\Clients\MockAdapter::mapRequestParameters()
     */
    public function testRequestWithParameters()
    {
        $path = realpath(__DIR__.'/../../fixtures/').'/';
        $adapter = new MockAdapter($path);

        $expected = file_get_contents($path.'get_locations_search_facebook_places_id.json');
        $actual = $adapter->request('GET', 'locations/search', [
            'query' => ['facebook_places_id' => 'lalala']
        ]);
        $this->assertJsonStringEqualsJsonString((string) $actual, $expected);
    }

    /**
     */
    public function testPaginate()
    {
        $this->markTestIncomplete();
    }
}