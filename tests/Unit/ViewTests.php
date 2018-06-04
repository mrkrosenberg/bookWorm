<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLandingView() {

        $this->get('/')->assertSee('Welcome to Bookworm');

    }

    public function testLandingPage() {

        $this->get('/')->assertViewIs('home');

    }

    public function testLoginPage() {

        $this->get('/login')->assertViewIs('auth.login');

    }

    public function testRegisterPage() {

        $this->get('/register')->assertViewIs('auth.register');

    }

}