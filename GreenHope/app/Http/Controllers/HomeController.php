<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\events;
use App\Models\needs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home',[
            'events' => events::limit(2)->get(),
            'needs' => needs::limit(4)->get(),
            'categories' => category::all()
        ]);
    }
}
