# P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

Deskripsi
Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi
navigasi, dan validasi formulir sisi klien.
Fitur dan Pengembangan
Struktur HTML dan DOM: Membuat halaman Profil Mahasiswa yang terdiri dari Beranda, Tentang Saya, dan Kontak. Setiap bagian memiliki ID agar dapat diakses melalui JavaScript.

Interaksi Navigasi: Menambahkan tombol menu dengan ID navToggle dan daftar navigasi dengan ID navMenu untuk mendukung interaksi menu.

Formulir Kontak: Membuat formulir yang berisi nama lengkap, email, semester, tanggal kunjungan, jenis pesan, topik yang diminati, program studi, dan pesan.

Validasi Sisi Klien: Menambahkan atribut validasi HTML, seperti required, minlength, maxlength, min, max, dan type="email" untuk membantu memeriksa data yang dimasukkan pengguna.

Event dan Umpan Balik: Menyediakan tombol Kirim dan Batal serta elemen formFeedback untuk mendukung pengiriman formulir dan menampilkan pesan kepada pengguna. Implementasi JavaScript perlu diperiksa melalui file script.js.
Pengujian
engujian Navigasi: Memeriksa tautan Beranda, Tentang, dan Kontak untuk memastikan setiap tautan mengarah ke bagian halaman yang sesuai.

Pengujian Formulir: Memasukkan data pada setiap kolom dan memeriksa apakah atribut validasi berfungsi sesuai ketentuan.

Pengujian Nama: Memasukkan nama kurang dari 3 karakter untuk memeriksa ketentuan minimal nama.

Pengujian Email: Memasukkan email dengan format tidak valid untuk memeriksa validasi email.

Pengujian Semester: Memasukkan angka di bawah 1 atau di atas 14 untuk memeriksa batas semester.

Hasil Pengujian: Berdasarkan kode HTML, atribut validasi sudah disiapkan. Namun, keberhasilan interaksi navigasi dan validasi JavaScript belum dapat dipastikan tanpa memeriksa script.js dan menguji halaman di browser.

Perbarui bagian ini setelah melakukan pengujian atau debugging yang relevan.
Riwayat Pengembangan
Catat perkembangan melalui commit Git yang bermakna.
Membuat struktur halaman Profil Mahasiswa: Menambahkan bagian Beranda, Tentang Saya, Kontak, dan footer menggunakan HTML semantik.

- Menambahkan navigasi dan formulir kontak: Membuat menu navigasi serta formulir dengan berbagai jenis input.
- Menambahkan atribut validasi: Menentukan aturan pengisian nama, email, semester, dan kolom wajib lainnya.
- Menghubungkan JavaScript: Memanggil file script.js untuk mendukung interaksi navigasi, event listener, dan validasi formulir.

Pesan commit Git yang disarankan:

1. Menambahkan struktur halaman profil mahasiswa
2. Menambahkan navigasi dan formulir kontak
3. Menambahkan atribut validasi formulir
4. Menghubungkan JavaScript untuk interaksi halaman
