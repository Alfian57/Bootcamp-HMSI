@section('title')
    {{ __('dashboard/users.edit.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/users.edit.page-title') }}">

        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-dashboard::ui.input type="email" label="{{ __('dashboard/users.form.email.label') }}" name="email"
                placeholder="{{ __('dashboard/users.form.email.placeholder') }}" value="{{ old('email', $user->email) }}"
                required />

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/users.form.name.label') }}" name="name"
                placeholder="{{ __('dashboard/users.form.name.placeholder') }}" value="{{ old('name', $user->name) }}"
                required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.gender.label') }}" name="gender"
                :options="$genderOptions" :selected="old('gender', $user->gender)" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-admin.label') }}" name="is_admin"
                :options="$roleOptions" :selected="old('is_admin', $user->is_admin)" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-active.label') }}" name="is_active"
                :options="$activeOptions" :selected="old('is_active', $user->is_active)" required />

            <x-dashboard::ui.input type="date" label="{{ __('dashboard/users.form.date-of-birth.label') }}"
                name="date_of_birth" placeholder="{{ __('dashboard/users.form.date-of-birth.placeholder') }}"
                value="{{ old('date_of_birth', $user->date_of_birth) }}" required />

            <x-dashboard::ui.input type="tel" label="{{ __('dashboard/users.form.phone-number.label') }}"
                name="phone_number" placeholder="{{ __('dashboard/users.form.phone-number.placeholder') }}"
                value="{{ old('phone_number', $user->phone_number) }}" required />

            <x-dashboard::ui.input type="file" label="{{ __('dashboard/users.form.photo-profile.label') }}"
                name="photo_profile">
                <x-slot name="body">
                    <br>
                    <img src="{{ asset('storage/' . $user->photo_profile) }}"
                        alt="{{ __('dashboard/global.image-error') }}" class="img-fluid mt-3 text-danger"
                        style="max-height: 200px;">
                </x-slot>
            </x-dashboard::ui.input>

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
