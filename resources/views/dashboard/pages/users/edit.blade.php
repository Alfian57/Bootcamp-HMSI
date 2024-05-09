@section('title')
    Tambah Pengguna
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="Tambah Pengguna">

        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-dashboard::ui.input type="email" label="Email" name="email" placeholder="Masukan email"
                value="{{ old('email', $user->email) }}" disabled />

            <x-dashboard::ui.input type="text" label="Nama Pengguna" name="name"
                placeholder="Masukan nama pengguna" value="{{ old('name', $user->name) }}" required />

            <x-dashboard::ui.input.select label="Jenis Kelamin" name="gender" :options="[
                \App\Enums\Gender::MALE->value => 'Laki-laki',
                \App\Enums\Gender::FEMALE->value => 'Perempuan',
            ]" :selected="old('gender', $user->gender)"
                required />

            <x-dashboard::ui.input.select label="Role" name="is_admin" :options="[
                true => 'Admin',
                false => 'Pembeli',
            ]" :selected="old('is_admin', $user->is_admin)" required />

            <x-dashboard::ui.input.select label="Akun Aktif" name="is_active" :options="[
                true => 'Aktif',
                false => 'Tidak Aktif',
            ]" :selected="old('is_active', $user->is_active)"
                required />

            <x-dashboard::ui.input type="date" label="Tanggal Lahir" name="date_of_birth"
                placeholder="Masukan tanggal lahir" value="{{ old('date_of_birth', $user->date_of_birth) }}" required />

            <x-dashboard::ui.input type="tel" label="Nomor Telepon" name="phone_number"
                placeholder="Masukan nomor telepon" value="{{ old('phone_number', $user->phone_number) }}" required />

            <x-dashboard::ui.input type="file" label="Foto Profil" name="photo_profile">
                <x-slot name="body">
                    <br>
                    <img src="{{ asset('storage/' . $user->photo_profile) }}" alt="Gambar rusak atau kosong"
                        class="img-fluid mt-3 text-danger" style="max-height: 200px;">
                </x-slot>
            </x-dashboard::ui.input>

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    Kirim
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
