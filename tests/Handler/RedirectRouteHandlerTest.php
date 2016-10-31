<?php

namespace Tests\Handler;

use ElementsFramework\DynamicRouting\Model\DynamicRoute;
use ElementsFramework\DynamicRouting\Handler\RedirectRouteHandler;
use Illuminate\Http\Request;
use Tests\BaseTest;

class RedirectRouteHandlerTest extends BaseTest
{
    public function testProcessWithRedirect()
    {
        $route = new DynamicRoute();
        $route->fill([
            'name' => 'test',
            'pattern' => '/test',
            'method' => 'get',
            'handler' => 'RedirectRouteHandler',
            'configuration' => ['target' => 'http://google.com', 'status_code' => 302],
        ]);

        $redirectRoute = new RedirectRouteHandler();
        $response = $redirectRoute->process(new Request(), $route);

        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testIsValidTargetFalse()
    {
        $route = new DynamicRoute();
        $route->fill([
            'name' => 'test',
            'pattern' => '/test',
            'method' => 'get',
            'handler' => 'RedirectRouteHandler',
            'configuration' => [],
        ]);

        $redirectRoute = new RedirectRouteHandler();

        $this->assertEquals(false, $redirectRoute->isValid($route));
    }
}
