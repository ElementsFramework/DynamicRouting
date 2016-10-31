<?php


namespace Tests\Service;


use Closure;
use ElementsFramework\DynamicRouting\Model\DynamicRoute;
use ElementsFramework\DynamicRouting\Service\RouteClosureProvider;
use Illuminate\Http\RedirectResponse;
use Tests\BaseTest;
use Illuminate\Http\Request;

class RouteClosureProviderTest extends BaseTest
{

    public function testGetClosureById()
    {
        DynamicRoute::create([
            'method' => 'get',
            'name' => 'test',
            'pattern' => '/test',
            'handler' => 'RedirectRouteHandler',
            'configuration' => ['target' => '/'],
        ]);

        $this->assertInstanceOf(Closure::class, RouteClosureProvider::forRouteId(1));
    }

    public function testForRoute()
    {
        $route = DynamicRoute::create([
                    'method' => 'get',
                    'name' => 'test',
                    'pattern' => '/test',
                    'handler' => 'RedirectRouteHandler',
                    'configuration' => ['target' => '/'],
                ]);

        $this->assertInstanceOf(RedirectResponse::Class, call_user_func(RouteClosureProvider::forRoute($route), new Request()));
    }

}
