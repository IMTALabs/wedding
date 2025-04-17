<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase; // Use RefreshDatabase to reset the database for each test
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Add this trait

    /**
     * Test if a user can be created using the factory.
     *
     * @return void
     */
    public function test_user_can_be_created_with_factory(): void
    {
        // Create a user instance using the factory without saving to the database
        $user = User::factory()->make();

        // Assert that the created instance is of type User
        $this->assertInstanceOf(User::class, $user);

        // Optionally, assert specific attributes if needed
        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->email);
    }

    /**
     * Test if a user can be persisted to the database.
     *
     * @return void
     */
    public function test_user_can_be_persisted(): void
    {
        // Create and save a user using the factory
        $user = User::factory()->create();

        // Assert the user exists in the database
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
        ]);
    }
}
