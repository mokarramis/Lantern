<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    protected User $user;
    protected string $username, $password, $email, $url;

    public function setUp(): void
    {
        parent::setUp();
        $this->user     = new User();
        $this->username = 'username';
        $this->password = 'password';
        $this->email    = 'emil@mail.com';
        $this->url      = $this->user->signup_url;
    }

    public function test_user_can_sign_up()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'email'    => $this->email
        ];
        $response = $this->post($this->url, $data);
        $response->assertStatus(200);
    }
}
