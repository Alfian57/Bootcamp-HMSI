<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\UserRegistrationMail;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        if (!isset($validatedData['password'])) {
            $validatedData['password'] = Str::random(10);
        }

        $user = User::create($validatedData);
        Mail::to($user->email)->queue(new UserRegistrationMail(
            $user->name,
            $user->email,
            $validatedData['password'],
        ));

        toast('Pengguna berhasil ditambahkan', 'success');
        return redirect()->route('dashboard.users.index');
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
        Gate::authorize('delete', $user);

        if ($user->photo_profile) {
            Storage::delete($user->photo_profile);
        }

        $user->delete();
        toast('Pengguna berhasil dihapus', 'success');

        return redirect()->route('dashboard.users.index');
    }
}
