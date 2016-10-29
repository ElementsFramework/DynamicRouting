<?php
namespace Tests\Console;

use Tests\BaseTest;

class SyncProvidedRoutesCommandTest extends BaseTest
{
    public function testHandle()
    {
        $this->artisan('dynamic-route:provided:sync');
        $this->assertTrue(true);
    }
}