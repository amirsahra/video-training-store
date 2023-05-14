<?php

namespace Modules\Authentication\Tests\Unit\Http\Controllers\AuthenticationController;

use Illuminate\Contracts\Support\Renderable;
use Modules\Authentication\Http\Controllers\AuthenticationController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    private AuthenticationController $controller;
    protected function setUp(): void
    {
        $this->controller = new AuthenticationController();
        parent::setUp();
    }

    public function testReturnViewSuccess()
    {
        $view = $this->controller->index();
        $this->assertEquals('authentication::index', $view->getName());
        //$this->assertArrayHasKey('data', $view->getData());
    }
}
