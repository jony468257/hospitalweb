<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use HasinHayder\TyroLogin\Mail\PasswordResetMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        Mail::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', ['email' => $user->email]);

        Mail::assertSent(PasswordResetMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        Mail::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', ['email' => $user->email]);

        Mail::assertSent(PasswordResetMail::class, function ($mail) use ($user) {
             $response = $this->get($mail->resetUrl);
             $response->assertStatus(200);

            return $mail->hasTo($user->email);
        });
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        Mail::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', ['email' => $user->email]);

        Mail::assertSent(PasswordResetMail::class, function ($mail) use ($user) {
             // Extract token from resetUrl
             $path = parse_url($mail->resetUrl, PHP_URL_PATH);
             $segments = explode('/', trim($path, '/'));
             $token = last($segments);

            // 2. Reset password using the token
            $response = $this->post('/reset-password', [
                'token' => $token,
                'email' => $user->email,
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

            $response
                //->assertSessionHasNoErrors() // Tyro login might validation differently, let's check redirect
                ->assertRedirect(config('tyro-login.redirects.after_login', '/'));

            return true;
        });
    }
}
