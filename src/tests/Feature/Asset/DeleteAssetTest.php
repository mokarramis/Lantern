<?php

namespace Tests\Feature\Asset;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteAssetTest extends TestCase
{
    protected User $user;
    protected Asset $asset;
    protected string $user_id, $purchase_time, $other, $url;

    public function setUp(): void
    {
        parent::setUp();
        $this->user    = User::factory()->create();
        $this->user_id = $this->user->id;
        $this->asset   = Asset::factory()->create(['user_id' => $this->user_id]);
        $this->url     = $this->asset->asset_url;
    }

    public function test_an_unautenticated_user_cant_update_asset()
    {
        $response = $this->delete('api' . $this->url . '/destroy'. '/' . $this->asset->id);
        $response->assertStatus(500);
    }
}