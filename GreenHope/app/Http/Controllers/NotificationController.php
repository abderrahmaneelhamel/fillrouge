<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\DonationNotification;


class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('home');
    }
    
    public static function sendDonationNotification(string $id,$data) {
        $user = User::where('id',$id)->get();
        $userSchema = $user;
        $url = '/donations';
  
        $Data = [
            'name' => $user[0]->name,
            'body' => 'You received a Donation, he said : ',$data,
            'Url' => url($url),
        ];
  
        Notification::send($userSchema, new DonationNotification($Data,$url));
   
    }
    public static function sendAddingNotification(string $id) {
        $user = User::where('id',$id)->get();
        $userSchema = $user;
        $url = '/donations';
        $Data = [
            'name' => $user[0]->name,
            'body' => 'Your Donation has been taken',
            'thanks' => 'Thank you',
            'Url' => url($url),
        ];
  
        Notification::send($userSchema, new DonationNotification($Data,$url));
    }
}
