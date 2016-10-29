<?php
namespace Tests\Console;

use Tests\BaseTest;
use Tests\Service\Publishing\MockRouteProvider;

class PublishProvidedRoutesCommandTest extends BaseTest
{

    public function testCommand()
    {
        require_once(__DIR__ . '/../Service/Publishing/MockRouteProvider.php');

        config(['dynamic-routing.route-providers' => [MockRouteProvider::class]]);

        $this->artisan('dynamic-route:provided:publish');
        $this->assertTrue(true);
    }

}
