<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',

        ];

        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role->name == 'Anggota') {
                $visitDate = now()->toDateString();
                $existingLog = VisitorLog::where('visit_date', $visitDate)->first();
                if ($existingLog) {
                    $existingLog->visitor_count += 1;
                    $existingLog->save();
                } else {
                    VisitorLog::create([
                        'visit_date' => $visitDate,
                        'visitor_count' => 1
                    ]);
                }
                return redirect()->route('guest.books');
            } else {
                return redirect()->route('apps.dashboard');
            }
        } else {
            return redirect()->route('auth')->with('error', 'Email atau password salah.');
        }
    }

    public function signup()
    {
        $data = [
            'title' => 'Daftar',
        ];

        return view('auth.register', $data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => 1,
            'image' => 'default.png',
        ]);
        $customerRole = Role::findByName('Anggota');
        $user->assignRole($customerRole);

        return redirect()->route('auth')->with('success', 'Berhasil Membuat Akun!');
    }

    public function logout()
    {
        if (Auth::user()->role('Anggota')) {
            Auth::logout();
            session()->flush();
            return redirect()->route('home')->with('success', 'Anda berhasil keluar.');
        } else {
            Auth::logout();
            session()->flush();
            return redirect()->route('auth')->with('success', 'Anda berhasil keluar.');
        }
    }
}
