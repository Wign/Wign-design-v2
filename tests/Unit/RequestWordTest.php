<?php

namespace Tests\Unit;

use App\Http\Controllers\RequestController;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestWordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Auth::loginUsingId(1);
        $controller = new RequestController();
    }
}
