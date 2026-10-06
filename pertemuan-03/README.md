# pertemuan-03 - Formulir HTML dan CSS Dasar

## Baseline

- Menggunakan hasil P2 sebagai dasar pengembangan P3.
- Menyalin `index.html` dan `img/foto-profil.jpg` ke `pertemuan-03/`.

## Implementasi Formulir

- Elemen form yang digunakan:

1. form — sebagai wadah seluruh formulir.
2. label — untuk memberikan label pada setiap input.
3. input type="text" — untuk Nama Lengkap.
4. input type="email" — untuk Email.
5. input type="number" — untuk Semester.
6. input type="date" — untuk Tanggal Kunjungan.
7. input type="radio" — untuk memilih Jenis Pesan:
   -Pertanyaan
   -Saran
8. input type="checkbox" — untuk memilih Topik yang Diminati:
   HTML
   CSS
9. select — untuk memilih Program Studi.
10. option — pilihan di dalam (select):
    -Sistem Informasi
    -Teknik Informatika
11. textarea>— untuk memasukkan Pesan.
12. button type="submit" — tombol Kirim.
13. button type="reset" — tombol Batal.

- Tipe input yang digunakan:

1. Text - Untuk memasukkan nama lengkap
2. Email - Untuk memasukkan alamat email
3. Number - Untuk memasukkan semester
4. Date - Untuk memilih tanggal kunjungan
5. Radio - Untuk memilih jenis pesan (Pertanyaan/Saran)

- Atribut validasi yang digunakan:

1. required yang membuat input wajib diisi.
   Digunakan pada nama, email, semester, tanggal, jenis_pesan, prodi, dan pesan.

2. minlength="3" untuk menentukan jumlah karakter minimum.
   Digunakan pada input Nama Lengkap minimal 3 karakter sesuai minlength yang tertera yaitu 3.

3. maxlength="50" untuk menentukan jumlah karakter maksimum.
   Digunakan pada input Nama Lengkap, maksimal 50 karakter sesuai maxlength nya yang sudah pasti hanya 50.

4. min="1" yang menentukan nilai minimum.
   Digunakan pada input Semester, minimal semester 1.

5. max="14" yang menentukan nilai maksimum.
   Digunakan pada input Semester, maksimal semester 14.

6. type="email" untuk melakukan validasi format alamat pada email.
   Digunakan pada input Email.

## Pengujian GET dan POST

- Hasil pengujian GET:
  Berhasil. Data form dapat dikirim menggunakan metode GET dan data yang dimasukkan muncul pada URL sebagai query string.

- Contoh URL encoding yang ditemukan:

  `index.html?nama=Rafika+Fadhilah&email=rafika%40email.com&semester=3&tanggal=2026-10-06&jenis_pesan=pertanyaan&minat=HTML&prodi=TI&pesan=Belajar+HTML`

  Pada URL tersebut:
  1. Spasi diubah menjadi `+`.
  2. Karakter `@` pada email diubah menjadi `%40`.
  3. Data setiap input ditampilkan dalam bentuk `nama=nilai`.
  4. Antar-data dipisahkan menggunakan tanda `&`.

- Hasil pengujian POST:
  Form dikirim, tetapi halaman yang sama muncul kembali tanpa menampilkan data. Halaman HTML statis tidak memproses data POST

## CSS Dasar

- Selector elemen: h2, h3, p, ol, button, label
- Selector class: .form-group, .input-form
- Selector ID: #about, #contact
- Properti CSS dasar yang digunakan: background-color, color, font-family, font-size, font-weight, margin, padding, dan border.

## Pengujian dan Perbaikan

- Galat yang ditemukan:
  Pada awal pengujian, gambar foto profil tidak tampil pada halaman karena path atau lokasi file gambar belum sesuai dengan pemanggilan pada atribut `src`.
- Penyebab galat:
  Path pada `src="img/foto-profil.jpg"` harus sesuai dengan struktur folder. File `foto-profil.jpg` harus berada di dalam folder `img` yang berada satu tingkat dengan `index.html`.
- Perbaikan yang dilakukan:
  Memastikan struktur folder dan nama file sudah sesuai, yaitu:

  `pertemuan-03/index.html`

  `pertemuan-03/img/foto-profil.jpg`

  Kemudian menggunakan pemanggilan gambar:
  `<img src="img/foto-profil.jpg" alt="Foto profil Rafika Fadhilah">`

- Hasil pengujian ulang: tidak ada kesalahan
  Halaman HTML berhasil dijalankan. Formulir dapat digunakan, validasi HTML berjalan sesuai atribut yang diberikan, tombol Kirim dan Batal berfungsi, serta CSS dasar berhasil diterapkan pada halaman.

## GitHub Pages
