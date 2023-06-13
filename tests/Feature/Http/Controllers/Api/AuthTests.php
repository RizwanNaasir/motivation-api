<?php

namespace Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AuthTests extends TestCase
{
    use RefreshDatabase;

    public function test_login_via_multiple_brute_force_attempts()
    {
        $user = User::factory()->create([
            'email' => 'me@example.com',
            'password' => bcrypt('password'),
        ]);
        $response = $this->postJson(route('api.login'), [
            'email' => '',
            'password' => ''
        ]);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The email field is required.']);

        $response = $this->postJson(route('api.login'), [
            'email' => $user->email,
            'password' => ''
        ]);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The password field is required.']);

        $response = $this->postJson(route('api.login'), [
            'email' => $user->email,
            'password' => 'password',
            'device_token' => ''
        ]);

        $response->assertStatus(422)
            ->assertJson(['message' => 'The device token field is required.']);

        $response = $this->postJson(route('api.login'), [
            'email' => $user->email,
            'password' => 'password',
            'device_token' => '1234567890'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['token'], 'message']);
    }

    public function test_user_can_register()
    {
        $response = $this->postJson(route('api.register'), [
            'f_name' => 'John',
            'l_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['token'], 'message']);
    }

    public function test_non_authenticated_user_cannot_get_user_details()
    {
        $response = $this->json('GET', route('api.user.profile'));

        $response->assertStatus(401)
            ->assertSee('Unauthenticated');
    }

    public function test_non_authenticated_user_cannot_logout()
    {
        $response = $this->json('POST', route('api.logout'), []);

        $response->assertStatus(401)
            ->assertSee('Unauthenticated');;
    }


    public function test_authenticated_user_can_logout()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->json('POST', route('api.logout'), []);

        $response->assertStatus(200);
    }

    public function test_send_password_reset_link_if_email_exists()
    {
        Notification::fake();
        $user = User::factory()->create();
        $response = $this->postJson(route('api.user.send.reset.mail'), ['email' => $user->email]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Reset link sent to your email']);
    }

    public function test_send_email_verification_link_if_email_exists()
    {
        Notification::fake();
        $user = User::factory()->create([
            'email_verified_at' => null
        ]);
        $this->actingAs($user);
        $response = $this->postJson(route('api.user.send.verification.mail'), ['email' => $user->email]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Verification link will be sent on your email.']);
    }

    public function test_verify_email()
    {
        Notification::fake();
        $user = User::factory()->create([
            'email_verified_at' => null
        ]);
        $response = $this->getJson(route('verification.verify', [
            'id' => $user->id,
            'hash' => sha1($user->email)
        ]));

        $response->assertStatus(200)
            ->assertJson([
                "message" => "success",
                "data" => "Email verified successfully."
            ]);
    }

    public function test_reset_password_success()
    {
        $user = User::factory()->create();
        $token = Password::broker()->createToken($user);
        $new_password = 'testpassword';

        $response = $this->postJson(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => $new_password,
            'password_confirmation' => $new_password,
        ]);

        $response->assertStatus(302);
    }
}
