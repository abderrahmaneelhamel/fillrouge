<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\events;
use App\Models\needs;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $inneed = count(User::all()->filter(function ($user) {return $user->hasRole('Inneed');}));
        $donors = count(User::all()->filter(function ($user) {return $user->hasRole('Donor');}));
        $events = count(events::all());

        return view('home',[
            'events' => events::limit(2)->get(),
            'needs' => needs::limit(3)->get(),
            'categories' => category::all(),
            'inneed' => $inneed,
            'donors' => $donors,
            'eventsC' => $events
        ]);
    }
}
