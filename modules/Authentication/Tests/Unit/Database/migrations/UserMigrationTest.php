<?php

namespace Modules\Authentication\Tests\Unit\Database\migrations;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;


class UserMigrationTest extends TestCase
{
    public function testChangeUserTableColumnSuccess()
    {
        $userTableColumn = Schema::getColumnListing('users');
        $this->assertContains('usernames', $userTableColumn,
            'The default `user` field has not been changed to `username`.');
    }
}
