<?php

namespace App\Http\Controllers;

use App\Models\events;
use App\Models\money_donations;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('events.view', [
            'events' => events::paginate(4),
            'users' => User::all(),
        ]);
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
        $this->validate($request, [
            "label" => 'required',
            "organisation" => 'required',
            "description" => 'required',
            "amount" => 'required',
            "location" => 'required',
            "emergency" => 'required',
            "file" => ['file', 'mimes:docx,pdf,jpeg,png,jpg'],
        ]);
        $cloud = cloudinary::geteventsSignature();
        $response = Http::attach('file', file_get_contents($request->file('file')), 'image'.'.'.$request->file->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud['timestamp'],
            'signature' => $cloud['signature'],
            'folder' => 'greenHope events',
        ]);

        $jsonData = $response->json();

        events::create([
            "label" => $request->label,
            "image" => $jsonData['url'],
            "description" => $request->description,
            "organisation" => $request->organisation,
            "amount" => $request->amount,
            "location" => $request->location,
            "emergency" => $request->emergency,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::all();
        return view('events.edit', [
            'event' => events::findOrFail($id),
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function add(Request $request){
        $this->validate($request, [
            "id" => 'required',
            "amount" => 'required',
        ]);
        $event = events::where('id' , $request->id)->get();
        events::where('id' , $request->id)->update([
            "raised" => ($event[0]->raised + $request->amount),
        ]);
        money_donations::create([
            "amount" => $request->amount,
            "donor" => Auth::user()->id,
            "To" => $event[0]->organisation,
        ]);
        return Redirect::to('/events');
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "label" => 'required',
            "organisation" => 'required',
            "description" => 'required',
            "amount" => 'required',
            "location" => 'required',
            "emergency" => 'required',
        ]);
        $event = events::where('id' , $id)->get();
        events::where('id' , $id)->update([
            "label" => $request->label,
            "description" => $request->description,
            "organisation" => $request->organisation,
            "amount" => $request->amount,
            "raised" => $request->raised ? $request->raised : $event[0]->raised,
            "location" => $request->location,
            "emergency" => $request->emergency,
        ]);
        return Redirect::to('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        events::where('id',$id)->delete();

        return Redirect::to('/dashboard');
    }
}
