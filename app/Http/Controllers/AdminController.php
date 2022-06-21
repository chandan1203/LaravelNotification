<?php

namespace App\Http\Controllers;

use App\Events\AdminEvent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // event(new AdminEvent('Hey! How are you'));
        return view('admin');
    }
}
