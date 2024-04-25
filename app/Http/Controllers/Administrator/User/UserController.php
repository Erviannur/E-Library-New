<?php

namespace App\Http\Controllers\Administrator\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengguna',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route("apps.dashboard"),
                ],
                [
                    'title' => 'Pengguna',
                    'is_active' => true,
                ],

            ],
            'users' => User::orderBy('name','ASC')->get(),
        ];

        return view('administrator.user.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route("apps.dashboard")
                ],
                [
                    'title' => 'Pengguna',
                    'url' => route("apps.users")
                ],
                [
                    'title' => 'Tambah Pengguna',
                    'is_active' => true,
                ],
            ],
            'roles' => Role::get(),
            'action' => route("apps.users.store"),
        ];

        return view('administrator.user.form',$data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role_id' => 'required',
                'gender' => 'nullable|string',
                'address' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/images/users'), $imageName);
            } else {
                $imageName = 'default.png';
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'image' => $imageName,
            ]);

            return redirect()->route('apps.users')->with('success', 'User berhasil dibuat.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'breadcrumbs' => [
                [
                    'title' => 'Beranda',
                    'url' => route("apps.dashboard")
                ],
                [
                    'title' => 'Pengguna',
                    'url' => route("apps.users")
                ],
                [
                    'title' => 'Edit Pengguna',
                    'is_active' => true,
                ],
            ],
            'user' => $user,
            'roles' => Role::get(),
            'action' => route("apps.users.update", $user->hashid),
        ];

        return view('administrator.user.form', $data);
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,'. $user->id,
                'role_id' => 'required',
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

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'image' => $filename,
            ]);

            return redirect()->route('apps.users')->with('success','Berhasil mengedit data');
        } catch (Exception $e) {
            Log::error('Gagal mengedit data: '.$e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}