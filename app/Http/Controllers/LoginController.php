<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
        //
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $field = 'email'; 
    
        $user = null;
        if ($field === 'email') {
            $user = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        }
    
        if ($user) {
            $request->session()->regenerate();
    
            // Cek apakah pengguna adalah admin atau pelanggan
            if (auth()->user()->is_admin) {
                // Jika pengguna adalah admin
                return redirect()->to('/dashboard');
            } elseif (auth()->user()->is_pelanggan) {
                // Jika pengguna adalah pelanggan
                return redirect()->to('/');
            }
    
            // Jika tidak admin maupun pelanggan, bisa ditambahkan redirect lain jika diperlukan
        }
    
        return back()->with('loginError', 'Login Gagal!');
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
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
