<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\cloudinary;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "file" => ['file', 'mimes:docx,pdf,png,jpg'],
        ]);
        $cloud = cloudinary::getsignature();
        $response = Http::attach('file', file_get_contents($request->file('file')), 'image'.'.'.$request->file->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud['timestamp'],
            'signature' => $cloud['signature'],
            'folder' => 'greenHope users',
        ]);
        $jsonData = $response->json();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'picture' => $jsonData['url'],
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
