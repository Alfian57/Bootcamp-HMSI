@section('title')
    {{ __('dashboard/users.create.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/users.create.page-title') }}">

        <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-dashboard::ui.input type="email" label="{{ __('dashboard/users.form.email.label') }}" name="email"
                placeholder="{{ __('dashboard/users.form.email.placeholder') }}" value="{{ old('email') }}" required />

            <x-dashboard::ui.input type="text" label="{{ __('dashboard/users.form.name.label') }}" name="name"
                placeholder="{{ __('dashboard/users.form.name.placeholder') }}" value="{{ old('name') }}" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.gender.label') }}" name="gender"
                :options="$genderOptions" :selected="old('gender')" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-admin.label') }}" name="is_admin"
                :options="$roleOptions" :selected="old('is_admin')" required />

            <x-dashboard::ui.input.select label="{{ __('dashboard/users.form.is-active.label') }}" name="is_active"
                :options="$activeOptions" :selected="old('is_active')" required />

            <x-dashboard::ui.input type="date" label="{{ __('dashboard/users.form.date-of-birth.label') }}"
                name="date_of_birth" placeholder="{{ __('dashboard/users.form.date-of-birth.placeholder') }}"
                value="{{ old('date_of_birth') }}" required />

            <x-dashboard::ui.input type="tel" label="{{ __('dashboard/users.form.phone-number.label') }}"
                name="phone_number" placeholder="{{ __('dashboard/users.form.phone-number.placeholder') }}"
                value="{{ old('phone_number') }}" required />

            <x-dashboard::ui.input type="file" label="{{ __('dashboard/users.form.photo-profile.label') }}"
                name="photo_profile" />

            <livewire:form.show-password-input />

            <p class="text-info">{{ __('dashboard/users.create.form-info') }}</p>

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
