<?php

namespace Tests\Unit;

use App\User;
use App\Word;
use Auth;
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
        factory(Word::class)->create();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRequestToggle()
    {
        $user = User::first();
        $word = Word::first();

        self::assertSame($user->likes()->count(), 0);

        Auth::loginUsingId($user->id);

        $response = $this->graphQL('
        mutation toggleRequest($word: WordInput!) {
            toggleRequestWord(word: { literal: $literal }) {
                id
                requesters_count
                user_requested
            }
        }'
        , [
            'literal' => $word->literal,
        ]);
        dd($response);
        self::assertNotEmpty($user->likes()->get());

    }
}
