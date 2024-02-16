<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DashboardPageTest extends TestCase
{
    use RefreshDatabase;
    public function test_dashboard_can_be_render()
    {
        $this->withoutExceptionHandling();
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $user = User::factory()->create()->assignRole($role);
        $this->actingAs($user);
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }
    public function test_dashboard_cant_be_render_without_role()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard');

        $response->assertStatus(403);
    }
    public function test_dashboard_redirect_if_user_not_authenticated()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect(route('login'));
    }
}
