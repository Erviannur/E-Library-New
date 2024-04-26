<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        $data = [
            'title' => 'Profil',
            'breadcrumbs' => [
                [
                    'title' => 'Profil',
                    'is_active' => true,
                ],
            ],

            'user' => $user
        ];
        
        return view('profile.index', $data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/images/users'), $filename);
            if ($user->image !== 'default.png') {
                File::delete(public_path('storage/images/users/'. $user->image));
            }
        } else {
            $filename = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $filename,
        ]);

        return redirect()->route('guest.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:5',
            'confirmPassword' => 'required|same:newPassword',
        ]);
    
        $user = Auth::user();
    
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->update([
                'password' => Hash::make($request->newPassword),
            ]);
    
            return redirect()->route('guest.profile')->with('success', 'Berhasil mengubah kata sandi.');
        } else {
            return redirect()->route('guest.profile')->with('error', 'Kata sandi lama tidak cocok. Gagal mengubah kata sandi.');
        }
    }    
}
