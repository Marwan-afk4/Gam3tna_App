<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile() {
        $user =auth()->user();

        $universty =$user->universty;
        $collage=$user->collage;

        return view('user.profile', compact('user', 'universty', 'collage'));
    }

    public function submit(Request $request) {
        $validator=$request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $validator['name'],
            'message' => $validator['message'],
        ]);
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
