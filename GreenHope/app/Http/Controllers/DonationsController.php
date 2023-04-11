<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\donations;
use App\Models\events;
use App\Models\needs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('donations.view', [
            'donations' => donations::paginate(9),
            'categories' => category::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function add(Request $request){
        $this->validate($request, [
            "id" => 'required',
            "description" => 'required',
            "file" => ['file', 'mimes:docx,pdf,jpeg,png,jpg'],
        ]);
        $cloud = cloudinary::getDonationsSignature();
        $response = Http::attach('file', file_get_contents($request->file('file')), 'image'.'.'.$request->file->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud['timestamp'],
            'signature' => $cloud['signature'],
            'folder' => 'greenHope donations',
        ]);

        $jsonData = $response->json();

        $user = Auth::user()->id;
        $need = needs::where('id' , $request->id)->get();
        donations::create([
            "label" => $need[0]->label,
            "image" => $jsonData['url'],
            "description" => $request->description,
            "category" => $need[0]->category,
            "donor" => $user,
            "To" => $need[0]->inneed_user->id,
        ]);
        needs::where('id' , $request->id)->delete();
        return redirect()->back();
    }

    public function geting(Request $request){
        $this->validate($request, [
            "id" => 'required',
        ]);
        $user = Auth::user()->id;
        donations::where('id' , $request->id)->update([
            "To" => $user,
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "label" => 'required',
            "category_id" => 'required',
            "description" => 'required',
            "file" => ['file', 'mimes:docx,pdf,jpeg,png,jpg'],
        ]);
        $cloud = cloudinary::getDonationsSignature();
        $response = Http::attach('file', file_get_contents($request->file('file')), 'image'.'.'.$request->file->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud['timestamp'],
            'signature' => $cloud['signature'],
            'folder' => 'greenHope donations',
        ]);

        $jsonData = $response->json();

        $user = Auth::user()->id;
        donations::create([
            "label" => $request->label,
            "image" => $jsonData['url'],
            "description" => $request->description,
            "category" => $request->category_id,
            "donor" => $user,
            "To" => $request->user_id ? $request->user_id : null,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = category::all();
        $users = User::all();
        return view('donations.edit', [
            'donation' => donations::findOrFail($id),
            'categories' => $category,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(donations $donations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "label" => 'required',
            "category" => 'required',
            "description" => 'required',
            "donor" => 'required',
        ]);

        donations::where('id' , $id)->update([
            "label" => $request->label,
            "description" => $request->description,
            "category" => $request->category,
            "donor" => $request->donor,
            "To" => $request->To ? $request->To : null,
        ]);
        return Redirect::to('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        donations::where('id',$id)->delete();

        return Redirect::to('/dashboard');
    }
}
