<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutUserTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_loggedin_can_be_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post(route('logout'))->assertRedirect(route('blog.index'));
    }
}
