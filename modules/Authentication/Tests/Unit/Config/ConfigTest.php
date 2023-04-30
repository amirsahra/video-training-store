<?php

namespace Modules\Authentication\Tests\Unit\Config;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;
class ConfigTest extends TestCase
{
    protected array $authConfig;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authConfig = Config::get('authentication');
    }

    public function testConfigKeysShouldBeExists()
    {
        $this->assertArrayHasKey('name', $this->authConfig,
            "Config doesn't contains 'name' as key");
        $this->assertArrayHasKey('default_user',
            $this->authConfig, "Config doesn't contains 'default_user' as key");
    }

}
