<?php

namespace Tests\Unit;

use App\Role;
use App\Sign;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use InitSeeder;
use Tests\TestCase;

class RequestToggleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(InitSeeder::class);

        factory(User::class)->create();
        factory(Sign::class)->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRequestToggle()
    {
        $user = User::first();
        $sign = Sign::first();

        self::assertEmpty($user->likes()->get());

        $response = $this->postGraphQL([
            'query' => '
            mutation toggleLike($userId: ID!, $signId: ID!) {
                ToggleLike(userId: $userId, signId: $signId) {
                    id
                }
            }
        ',
            'variables' => [
                'userId' => $user->id,
                'signId' => $sign->id,
            ],
        ]);

        self::assertNotEmpty($user->likes()->get());

    }
}
