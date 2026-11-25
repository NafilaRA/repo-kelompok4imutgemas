<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'  => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada di storage/public
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Simpan foto baru ke storage/app/public/avatars
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui! ✨');
    }
}