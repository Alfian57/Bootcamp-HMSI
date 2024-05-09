<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.users.index');
    }

    public function create()
    {
        return view('dashboard.pages.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->photo_profile) {
            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photo_profile');
        }

        User::create($validatedData);
        toast('Pengguna berhasil ditambahkan', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('dashboard.pages.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if ($request->photo_profile) {
            if ($user->photo_profile) {
                Storage::delete($user->photo_profile);
            }

            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photo_profile');
        }

        $user->update($validatedData);
        toast('Pengguna berhasil diubah', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        if ($user->photo_profile) {
            Storage::delete($user->photo_profile);
        }

        $user->delete();
        toast('Pengguna berhasil dihapus', 'success');

        return redirect()->route('dashboard.users.index');
    }
}
