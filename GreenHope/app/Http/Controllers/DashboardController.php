<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\donations;
use App\Models\events;
use App\Models\money_donations;
use App\Models\needs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')){
        $donations = donations::sortable()->get();
        $needs = needs::sortable()->get();
        $money_donations = money_donations::sortable()->get();
        $Categories = category::sortable()->get();
        $events = events::sortable()->get();
        $users = User::all();
                
        return view('dashboard',[
            'donations' => $donations,
            'needs' => $needs,
            'money_donations' => $money_donations,
            'Categories' => $Categories,
            'events' => $events,
            'users' => $users,
        ]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
