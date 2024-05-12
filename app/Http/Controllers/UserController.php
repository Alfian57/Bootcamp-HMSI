<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
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
        return view('dashboard.pages.users.create', [
            'genderOptions' => [
                Gender::MALE->value => __('enum.gender.male'),
                Gender::FEMALE->value => __('enum.gender.female'),
            ],
            'roleOptions' => [
                true => __('dashboard/users.form.is-admin.items.admin'),
                false => __('dashboard/users.form.is-admin.items.buyer'),
            ],
            'activeOptions' => [
                true => __('dashboard/users.form.is-active.items.active'),
                false => __('dashboard/users.form.is-active.items.inactive'),
            ],
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->photo_profile) {
            $validatedData['photo_profile'] = $request->file('photo_profile')->store('photo_profile');
        }
        if (! isset($validatedData['password'])) {
            $validatedData['password'] = Str::random(10);
        }

        $user = User::create($validatedData);
        Mail::to($user->email)->queue(new UserRegistrationMail(
            $user->name,
            $user->email,
            $validatedData['password'],
        ));

        toast(__('dashboard/users.create.success-message'), 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.pages.users.edit', [
            'user' => $user,
            'genderOptions' => [
                Gender::MALE->value => __('enum.gender.male'),
                Gender::FEMALE->value => __('enum.gender.female'),
            ],
            'roleOptions' => [
                true => __('dashboard/users.form.is-admin.items.admin'),
                false => __('dashboard/users.form.is-admin.items.buyer'),
            ],
            'activeOptions' => [
                true => __('dashboard/users.form.is-active.items.active'),
                false => __('dashboard/users.form.is-active.items.inactive'),
            ],
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
        toast(__('dashboard/users.edit.success-message'), 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        if ($user->photo_profile) {
            Storage::delete($user->photo_profile);
        }

        $user->delete();
        toast(__('dashboard/users.delete.success-message'), 'success');

        return redirect()->route('dashboard.users.index');
    }
}
