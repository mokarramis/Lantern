<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginTest extends TestCase
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
        $this->url      = $this->user->login_url;
    }

    public function test_a_user_cant_login()
    {
        Passport::actingAs($this->user);
        $response = $this->post('api' . $this->url);
        $response->assertStatus(422);
    }

    public function test_a_signed_in_user_can_login()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password
        ];

        $response = $this->post('api' . $this->url, $data);
        $response->assertStatus(200);
    }

    public function test_password_should_be_more_than_8_chars()
    {
        $data = [
            'username' => $this->username,
            'password' => '123'
        ];

        $response = $this->post('api' . $this->url, $data);

        $response->assertStatus(422);
    }

    public function test_username_should_be_more_than_5_chars()
    {
        $data = [
            'username' => 'user',
            'password' => $this->password
        ];

        $response = $this->post('api' . $this->url, $data);

        $response->assertStatus(422);
    }

    public function test_fileds_are_required()
    {
        $response = $this->post('api' . $this->url, []);

        $response->assertStatus(422);
    }
}
