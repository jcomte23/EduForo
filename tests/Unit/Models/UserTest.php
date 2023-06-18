<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_many_post(): void
    {
        $user=new User();
        $this->assertInstanceOf(Collection::class,$user->unionTblPost);
    }
}
