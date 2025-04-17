<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = UserModel::find(auth()->user()->user_id);
        return view('profile.index', ['user' => $user]);
    }

    public function edit()
    {
        $user = UserModel::find(auth()->user()->user_id);
        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $rules = [
            'username'         => 'required|max:20|unique:m_user,username,' . auth()->user()->user_id . ',user_id',
            'nama'             => 'required|max:100',
            'password'         => 'nullable|min:6|max:20',
            'profile_picture'  => 'nullable|image|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = UserModel::find(auth()->user()->user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Handle Upload Foto Profil
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            if ($file->isValid()) {
                // Hapus file lama jika ada
                if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                    Storage::disk('public')->delete($user->profile_picture);
                }

                // Simpan file baru
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('profile-pictures', $filename, 'public');
                $user->profile_picture = $path;
            }
        }

        // Handle Hapus Foto
        if ($request->input('remove_picture') == "1") {
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $user->profile_picture = null;
        }

        // Update Data
        $user->nama     = $request->nama;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

//     //delete profile
//     public function deletePicture(Request $request)
// {
//     $user = auth()->user();

//     if ($user) {
//         // Periksa apakah pengguna sudah memiliki foto profil
//         if ($user->profile_picture) {
//             // Hapus foto dari storage
//             $imagePath = $user->profile_picture;
//             if (Storage::disk('public')->exists($imagePath)) {
//                 Storage::disk('public')->delete($imagePath);
//             }

//             // Set kolom profile_picture ke null di database
//             $user->profile_picture = null;
//             $user->save();

//             return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
//         }

//         return redirect()->back()->with('error', 'Tidak ada foto profil untuk dihapus.');
//     }

//     return redirect()->back()->with('error', 'User tidak ditemukan.');
// }

 }
