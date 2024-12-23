<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Collage;
use App\Models\Universty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm()
{
    $universties = Universty::all();

    return view('auth.login', compact('universties'));
}

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role === 'superadmin') {
                return redirect()->route('admin.dashboard');
            }
            else {
                return redirect()->route('user.dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function showSignupForm(Request $request)
    {
        $universties = Universty::all();

        // If a university is selected, load the corresponding colleges
        if ($request->has('universty_id')) {
            $colleges = Collage::where('universty_id', $request->universty_id)->get();
        } else {
            // If no university is selected, pass an empty collection for colleges
            $colleges = collect();
        }

        return view('auth.signup', compact('universties', 'colleges'));
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string',
            'year' => 'required|integer',
            'universty_id' => 'required|exists:universties,id',
            'collage_id' => 'required|exists:collages,id',
        ]);

        // Create new user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'year' => $validated['year'],
            'universty_id' => $validated['universty_id'],
            'collage_id' => $validated['collage_id'],
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    public function getColleges($universityId)
{
    $colleges = Collage::where('universty_id', $universityId)->get();

    return response()->json($colleges);
}

}
