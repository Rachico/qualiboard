<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
        public function a_user_has_projects()
    {
         $user = factory('App\User')->create();
         $this->assertInstanceOf(Collection::class,$user->projects);
    }
}
