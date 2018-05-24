<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiGet()
    {
        $response = $this->json('GET', '/api/books');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => true
            ]);
    }

    public function testApiPost() {

        $response = $this->json('POST', 'api/book');

        $response  
            ->assertStatus(200)
            ->assertJson([
                'data' => true
            ]);

    }

}
