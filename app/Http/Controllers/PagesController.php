<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function main() {
        return view('pages.main');
    }

    public function login() {
        return view('auth.login');
    }

    public function signup() {
        return view('auth.register');
    }
}
