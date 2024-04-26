<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function test_can_show_user()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/api/users/' . $user->id);

        $response->assertStatus(200)
            ->assertJson($user->toArray());
    }

    public function test_can_register_user()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
        ];

        $response = $this->post('/api/users', $userData);

        $response->assertStatus(201)
            ->assertJson($userData);
    }

    public function test_can_update_user()
    {
        $user = factory(User::class)->create();

        $newUserData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'newpassword456',
        ];

        $response = $this->put('/api/users/' . $user->id, $newUserData);

        $response->assertStatus(200)
            ->assertJson($newUserData);
    }

    public function test_can_destroy_user()
    {
        $user = factory(User::class)->create();

        $response = $this->delete('/api/users/' . $user->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
