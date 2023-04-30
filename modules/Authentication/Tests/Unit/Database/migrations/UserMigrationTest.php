<?php

namespace Modules\Authentication\Tests\Unit\Database\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;


class UserMigrationTest extends TestCase
{
    use RefreshDatabase;
    public function testChangeUserTableColumnSuccess()
    {
        $this->artisan('migrate:fresh');

        $userTableColumn = Schema::getColumnListing('users');
        $this->assertContains('username', $userTableColumn,
            'The default `user` field has not been changed to `username`.');
    }
}
