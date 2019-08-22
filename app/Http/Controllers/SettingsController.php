<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller {

// Here we first run the middleware that only allows logged in users to access.

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('settings');
    }
}