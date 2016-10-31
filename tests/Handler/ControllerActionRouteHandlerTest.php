<?php
namespace Tests\Handler;

use Tests\BaseTest;
use Illuminate\Http\Request;
use ElementsFramework\DynamicRouting\Model\DynamicRoute;
use ElementsFramework\DynamicRouting\Handler\ControllerActionRouteHandler;

class ControllerActionRouteHandlerTest extends BaseTest
{
    public function testProcess()
    {
        $route = new DynamicRoute();
        $route->fill([
            'name' => 'test',
            'pattern' => '/test',
            'method' => 'get',
            'handler' => 'ControllerActionRouteHandler',
            'configuration' => ['target' => 'ElementsFramework\DynamicRouting\Handler\ControllerActionRouteHandler@isValid'],
        ]);

        $routeHandler = new ControllerActionRouteHandler();

        $this->assertEquals(false, $routeHandler->process(new Request(), $route));
    }

    public function testIsValidTrue()
    {
        $route = new DynamicRoute();
        $route->fill([
            'name' => 'test',
            'pattern' => '/test',
            'method' => 'get',
            'handler' => 'RedirectRouteHandler',
            'configuration' => ['target' => '/'],
        ]);

        $routeHandler = new ControllerActionRouteHandler();

        $this->assertEquals(true, $routeHandler->isValid($route));
    }
}