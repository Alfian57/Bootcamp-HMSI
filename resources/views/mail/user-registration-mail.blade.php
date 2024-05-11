@component('mail::message')
    <h2 style="color: #333333;">Selamat Bergabung, {{ $name }}!</h2>
    <p>Ini adalah email konfirmasi untuk memberitahu Anda bahwa registrasi Anda berhasil dan Anda sekarang memiliki akses ke
        akun Anda.</p>
    <p>Berikut adalah kredensial login Anda:</p>
    <ul>
        <li>
            <strong>Email Pengguna:</strong> {{ $email }}
        </li>
        <li>
            <strong>Kata Sandi:</strong> {{ $password }}
        </li>
    </ul>
    <p>Silakan gunakan kredensial ini untuk masuk ke akun Anda dan mulai menjelajahi layanan kami. Jangan ragu untuk
        menjelajahi berbagai fitur yang kami tawarkan dan jadilah bagian dari pengalaman yang mengagumkan.</p>
    <p>Ingatlah untuk menjaga kredensial ini tetap aman dan jangan bagikan kepada siapapun untuk menjaga keamanan akun Anda.
    </p>
    <p>Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk menghubungi tim dukungan kami di <a
            href="mailto:pembayaran_spp@example.com"
            style="color: #007bff; text-decoration: none;">bootcamp_hmsi@example.com</a> dan
        kami akan
        senang membantu Anda.</p>
    <br>
    <p style="color: #888888; font-size: 12px;">Pesan ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
@endcomponent
