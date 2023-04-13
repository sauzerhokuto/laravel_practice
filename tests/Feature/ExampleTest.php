<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_トップページのテスト(): void
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/');

        $response = $this->get('/')
            ->assertSeeText('記事一覧');
        // ->assertSeeText('タイトル')
    }
}
