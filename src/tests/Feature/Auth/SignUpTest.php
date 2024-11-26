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
        $this->email    = 'emil1@mail.com';
        $this->url      = $this->user->signup_url;
    }

    public function test_required_fields()
    {
        $response = $this->post('api' . $this->url, []);
        $response->assertStatus(422);
    }

    public function test_email_should_be_unique()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'email'    => $this->email
        ];

        $response = $this->post('api' . $this->url, $data);
        $response->assertStatus(422)->assertJson(['message' => 'The email has already been taken.']);
    }

    public function test_email_should_be_type_email()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'email'    => 'mail_gmail.com'
        ];

        $response = $this->post('api' . $this->url, $data);
        $response->assertStatus(422)->assertJson(['message' => 'The email field must be a valid email address.']);
    }

    public function test_username_should_be_more_than_5_chars()
    {
        $data = [
            'username' => 'user',
            'password' => $this->password,
            'email'    => 'email123@mail.com'
        ];

        $response = $this->post('api' . $this->url, $data);
        $response->assertStatus(422)->assertJson(['message' => 'The username field must be at least 5 characters.']);
    }

    public function test_password_should_be_more_than_8_chars()
    {
        $data = [
            'username' => $this->username,
            'password' => '123',
            'email'    => $this->email
        ];

        $response = $this->post('api' . $this->url, $data);
        $response->assertStatus(422)->assertJson(['message' => 'The password field must be at least 8 characters.']);
    }
}
