<?php

namespace Tests\Unit;

use App\Book;
use App\Http\Controllers\BooksController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageLoadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPageLoad()
    {
        $response = BooksController::indexByAuthor();

        $response->assertViewIs('books');

    }

}
