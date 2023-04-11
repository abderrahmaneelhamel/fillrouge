<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\needs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class needsController extends Controller
{
    public function index()
    {
        return view('needs.view', [
            'needs' => needs::paginate(4),
            'categories' => category::all()
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
            "category" => 'required',
        ]);
        $user = Auth::user()->id;
        needs::create([
            'label' => $request->label,
            'category' => $request->category,
            'inneed' => $request->inneed ? $request->inneed : $user
        ]);

        if(isset($request->inneed)){
            return Redirect::route('dashboard');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('needs.edit', [
            'need' => needs::findOrFail($id),
            'categories' => category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(needs $needs)
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
            "inneed" => 'required',
            "category" => 'required',
        ]);
        needs::where('id',$id)->update([
            "label" => $request->label,
            "inneed" => $request->inneed,
            "category" => $request->category,
        ]);
        return Redirect::route('dashboard')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        needs::where('id',$id)->delete();

        return Redirect::to('/dashboard');
    }
}
