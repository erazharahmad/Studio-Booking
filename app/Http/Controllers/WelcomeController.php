<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;

class WelcomeController extends Controller
{
    public function index(Request $requet)
    {
        $studios = Studio::get();
        return view('welcome',compact('studios'));
    }
}
