
<?php
// P7: menangkap nilai dari input form menggunakan GET

$nama = $_GET['nama'] ?? '';
$email = $_GET['email'] ?? '';
$semesterInput = $_GET['semester'] ?? '';
$tanggal = $_GET['tanggal'] ?? '';
$jenisPesan = $_GET['jenis_pesan'] ?? '';
$prodi = $_GET['prodi'] ?? '';
$pesan = $_GET['pesan'] ?? '';
$minat = $_GET['minat'] ?? [];

if (!is_array($minat)) {
    $minat = [];
}

// P6: PHP dasar dan pemrograman sisi peladen

// Bagian 1: Variabel dan konstanta
$nim = "2611500030";
$namaMahasiswa = "Rafika Fadhilah";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 2;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "satpamal";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;

$statusSemester = ($semesterValid && $statusAktif)
    ? "Sesuai rentang"
    : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
    $keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
    $keteranganSemester = "Semester menengah";
} else {
    $keteranganSemester = "Semester akhir";
}

// Bagian 4: Nama program studi dengan operator ternary
$namaProdi = ($programStudi == "SI")
    ? "Sistem Informasi"
    : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 5: Percabangan switch-case-default
switch ($programStudi) {
    case "SI":
        $fokusProgramStudi = "Sistem informasi dan proses bisnis";
        break;

    case "TI":
        $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
        break;

    default:
        $fokusProgramStudi = "Belum ditentukan";
}

// Status mahasiswa dengan operator ternary
$teksStatus = $statusAktif ? "Aktif" : "Tidak aktif";
?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"
    && ($_POST["form_type"] ?? "") === "peminjaman") {

    // Normalisasi masukan
    $nama = preg_replace('/\s+/', ' ', trim($_POST["nama"] ?? ""));
    $fasilitas = trim($_POST["fasilitas"] ?? "");
    $tanggal = trim($_POST["tanggal"] ?? "");
    $durasi = trim($_POST["durasi"] ?? "");
    $keperluan = trim($_POST["keperluan"] ?? "");

    $errors = [];

    // Validasi nama
    if ($nama === "") {
        $errors[] = "Nama wajib diisi.";
    }

    // Validasi fasilitas
    $daftarFasilitas = [
        "Ruang Kelas",
        "Aula",
        "Laboratorium Komputer",
        "Proyektor"
    ];

    if (!in_array($fasilitas, $daftarFasilitas, true)) {
        $errors[] = "Fasilitas tidak valid.";
    }

    // Validasi tanggal
    $tanggalObj = DateTime::createFromFormat("!Y-m-d", $tanggal);

    if (!$tanggalObj || $tanggalObj->format("Y-m-d") !== $tanggal) {
        $errors[] = "Tanggal tidak valid.";
    }

    // Validasi durasi
    if (filter_var($durasi, FILTER_VALIDATE_INT) === false
        || (int)$durasi < 1) {
        $errors[] = "Durasi minimal 1 jam.";
    }

    // Validasi keperluan
    if ($keperluan === "") {
        $errors[] = "Keperluan wajib diisi.";
    }

    if (empty($errors)) {

        // Menyimpan hasil ke session
        $_SESSION["flash_peminjaman"] = [
            "status" => "success",
            "data" => [
                "nama" => $nama,
                "fasilitas" => $fasilitas,
                "tanggal" => $tanggal,
                "durasi" => $durasi,
                "keperluan" => $keperluan
            ]
        ];

    } else {

        $_SESSION["flash_peminjaman"] = [
            "status" => "error",
            "errors" => $errors
        ];
    }

    // Post-Redirect-Get (PRG)
    header("Location: index.php#peminjaman");
    exit;
}

// Mengambil pesan session setelah redirect
$flashPeminjaman = $_SESSION["flash_peminjaman"] ?? null;

// Menghapus pesan sementara
unset($_SESSION["flash_peminjaman"]);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Mahasiswa - Rafika Fadhilah</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <div class="header-top">
        <h1>Profil Mahasiswa</h1>

        <button
            class="nav-toggle"
            id="navToggle"
            type="button"
            aria-label="Buka navigasi"
            aria-controls="navMenu"
            aria-expanded="false">
            &#9776;
        </button>
    </div>

    <nav aria-label="Navigasi utama">
        <ul id="navMenu">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#peminjaman">Peminjaman Fasilitas</a></li
            <li><a href="#contact">Kontak</a></li>
       
        </ul>
    </nav>
</header>

<main>

    <!-- BAGIAN HOME -->
    <section id="home">

        <h2>Selamat Datang</h2>

        <p>
            Halo, saya
            <strong><?= htmlspecialchars($namaMahasiswa, ENT_QUOTES, 'UTF-8') ?></strong>.
            Saya sedang mempelajari mata kuliah
            <strong><?= htmlspecialchars(NAMA_MATA_KULIAH, ENT_QUOTES, 'UTF-8') ?></strong>
            pada tahun akademik
            <?= htmlspecialchars($tahunAkademik, ENT_QUOTES, 'UTF-8') ?>.
        </p>

        <img
            src="img/foto-profil.jpg"
            alt="Foto profil Rafika Fadhilah">

    </section>


    <!-- BAGIAN ABOUT -->
    <section id="about">

        <h2>Tentang Saya</h2>

        <article>

            <h3>Profil Singkat</h3>

            <p>Sisa semester hingga batas: <?= $sisaSemester ?></p>

            <p>Pemeriksaan rentang semester: <?= $statusSemester ?></p>

            <p>
                Semester: <?= $semester ?>
                (<?= $keteranganSemester ?>)
            </p>

            <p>
                Program Studi: <?= $namaProdi ?>
                (<?= $programStudi ?>)
            </p>

            <p>Status mahasiswa: <?= $teksStatus ?></p>

            <p>Fokus program studi: <?= $fokusProgramStudi ?></p>

            <p>
                IPK: <?= number_format($ipk, 2, ',', '.') ?>
            </p>

            <p>
                Catatan tambahan:
                <?= $catatanTambahan === null
                    ? "Belum ada"
                    : htmlspecialchars($catatanTambahan, ENT_QUOTES, 'UTF-8') ?>
            </p>


            <h3>Nama Lengkap</h3>

            <p>
                <?= htmlspecialchars($namaMahasiswa, ENT_QUOTES, 'UTF-8') ?>
            </p>


            <h3>NIM</h3>

            <p>
                <?= htmlspecialchars($nim, ENT_QUOTES, 'UTF-8') ?>
            </p>


            <h3>Jurusan</h3>

            <p>
                <?= htmlspecialchars($namaProdi, ENT_QUOTES, 'UTF-8') ?>
            </p>


            <!-- PERULANGAN FOR -->
            <h3>Target Belajar (Perulangan for)</h3>

            <ol>
                <?php
                // Perulangan for tanpa array
                for ($i = 1; $i <= 5; $i++) {

                    echo "<li>Target belajar ke-" . $i . ": ";

                    switch ($i) {
                        case 1:
                            echo "Memahami sintaks dasar PHP.";
                            break;

                        case 2:
                            echo "Menggunakan variabel dan konstanta.";
                            break;

                        case 3:
                            echo "Menerapkan operator dan percabangan.";
                            break;

                        case 4:
                            echo "Menggunakan perulangan for dan while.";
                            break;

                        default:
                            echo "Belum dipetakan.";
                            break;
                    }

                    echo "</li>";
                }
                ?>
            </ol>


            <!-- PERULANGAN WHILE -->
            <h3>Semester (Perulangan while)</h3>

            <ol>
                <?php
                $nomorSemester = 1;

                while ($nomorSemester <= 3) {

                    echo "<li>Semester " . $nomorSemester . "</li>";

                    $nomorSemester++;
                }
                ?>
            </ol>

        </article>

    </section>


<section id="peminjaman">
    

<section id="peminjaman">

    <h2>Permohonan Peminjaman Fasilitas Kampus</h2>

    <form
        id="formPeminjaman"
        action="index.php"
        method="POST"
        novalidate>

        <input type="hidden" name="form_type" value="peminjaman">

        <div class="form-group">
            <label for="peminjamanNama">Nama Penanggung Jawab</label>
            <input
                class="input-form"
                type="text"
                id="peminjamanNama"
                name="nama"
                placeholder="Masukkan nama penanggung jawab"
                required>
        </div>

        <div class="form-group">
            <label for="peminjamanFasilitas">Jenis Fasilitas</label>
            <select
                class="input-form"
                id="peminjamanFasilitas"
                name="fasilitas"
                required>

                <option value="">-- Pilih Fasilitas --</option>
                <option value="Ruang Kelas">Ruang Kelas</option>
                <option value="Aula">Aula</option>
                <option value="Laboratorium Komputer">
                    Laboratorium Komputer
                </option>
                <option value="Proyektor">Proyektor</option>

            </select>
        </div>

        <div class="form-group">
            <label for="peminjamanTanggal">Tanggal Peminjaman</label>
            <input
                class="input-form"
                type="date"
                id="peminjamanTanggal"
                name="tanggal"
                required>
        </div>

        <div class="form-group">
            <label for="peminjamanDurasi">Durasi Peminjaman (jam)</label>
            <input
                class="input-form"
                type="number"
                id="peminjamanDurasi"
                name="durasi"
                min="1"
                placeholder="Masukkan durasi peminjaman"
                required>
        </div>

        <div class="form-group">
            <label for="peminjamanKeperluan">Keperluan Peminjaman</label>
            <textarea
                class="input-form"
                id="peminjamanKeperluan"
                name="keperluan"
                placeholder="Tuliskan keperluan peminjaman"
                required></textarea>
        </div>

        <p id="peminjamanFeedback" aria-live="polite"></p>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>

    </form>

    <!-- MENAMPILKAN DATA PEMINJAMAN -->

    <?php if ($flashPeminjaman): ?>

        <?php if ($flashPeminjaman["status"] === "success"): ?>

            <?php $data = $flashPeminjaman["data"]; ?>

            <h3>Data Peminjaman yang Diterima Peladen</h3>

            <p>
                Nama Penanggung Jawab:
                <?= htmlspecialchars($data["nama"], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Jenis Fasilitas:
                <?= htmlspecialchars($data["fasilitas"], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Tanggal Peminjaman:
                <?= htmlspecialchars($data["tanggal"], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Durasi Peminjaman:
                <?= htmlspecialchars($data["durasi"], ENT_QUOTES, 'UTF-8') ?> jam
            </p>

            <p>
                Keperluan Peminjaman:
                <?= nl2br(htmlspecialchars($data["keperluan"], ENT_QUOTES, 'UTF-8')) ?>
            </p>

        <?php else: ?>

            <h3>Data Peminjaman Belum Berhasil Diproses</h3>

            <ul>
                <?php foreach ($flashPeminjaman["errors"] as $error): ?>
                    <li>
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

    <?php endif; ?>

</section>




    <!-- BAGIAN CONTACT -->
    <section id="contact">

        <h2>Kontak</h2>

        <p>
            Kunjungi
            <a
                target="_blank"
                rel="noopener noreferrer"
                href="https://github.com/<?= rawurlencode(PROFIL_GITHUB) ?>">
                profil GitHub saya
            </a>.
        </p>


        <!-- FORMULIR P7 MENGGUNAKAN GET -->
        <form
            id="contactForm"
            action="index.php"
            method="get"
            novalidate>


            <!-- INPUT NAMA -->
            <div class="form-group">

                <label for="nama">Nama Lengkap</label>

                <input
                    class="input-form"
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    minlength="3"
                    maxlength="50"
                    value="<?= htmlspecialchars((string)$nama, ENT_QUOTES, 'UTF-8') ?>"
                    required>

            </div>


            <!-- INPUT EMAIL -->
            <div class="form-group">

                <label for="email">Email</label>

                <input
                    class="input-form"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="nama@email.com"
                    value="<?= htmlspecialchars((string)$email, ENT_QUOTES, 'UTF-8') ?>"
                    required>

            </div>


            <!-- INPUT SEMESTER -->
            <div class="form-group">

                <label for="semester">Semester</label>

                <input
                    class="input-form"
                    type="number"
                    id="semester"
                    name="semester"
                    min="1"
                    max="14"
                    value="<?= htmlspecialchars((string)$semesterInput, ENT_QUOTES, 'UTF-8') ?>"
                    required>

            </div>


            <!-- INPUT TANGGAL -->
            <div class="form-group">

                <label for="tanggal">Tanggal Kunjungan</label>

                <input
                    class="input-form"
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    value="<?= htmlspecialchars((string)$tanggal, ENT_QUOTES, 'UTF-8') ?>"
                    required>

            </div>


            <!-- RADIO BUTTON -->
            <fieldset class="form-group">

                <legend>Jenis Pesan</legend>

                <input
                    type="radio"
                    id="pertanyaan"
                    name="jenis_pesan"
                    value="pertanyaan"
                    <?= $jenisPesan === 'pertanyaan' ? 'checked' : '' ?>
                    required>

                <label for="pertanyaan">Pertanyaan</label>


                <input
                    type="radio"
                    id="saran"
                    name="jenis_pesan"
                    value="saran"
                    <?= $jenisPesan === 'saran' ? 'checked' : '' ?>>

                <label for="saran">Saran</label>

            </fieldset>


            <!-- CHECKBOX -->
            <fieldset class="form-group">

                <legend>Topik yang Diminati</legend>

                <input
                    type="checkbox"
                    id="minat-html"
                    name="minat[]"
                    value="HTML"
                    <?= in_array('HTML', $minat, true) ? 'checked' : '' ?>>

                <label for="minat-html">HTML</label>


                <input
                    type="checkbox"
                    id="minat-css"
                    name="minat[]"
                    value="CSS"
                    <?= in_array('CSS', $minat, true) ? 'checked' : '' ?>>

                <label for="minat-css">CSS</label>

            </fieldset>


            <!-- SELECT PROGRAM STUDI -->
            <div class="form-group">

                <label for="prodi">Program Studi</label>

                <select
                    class="input-form"
                    id="prodi"
                    name="prodi"
                    required>

                    <option value="">-- Pilih Program Studi --</option>

                    <option
                        value="SI"
                        <?= $prodi === 'SI' ? 'selected' : '' ?>>
                        Sistem Informasi
                    </option>

                    <option
                        value="TI"
                        <?= $prodi === 'TI' ? 'selected' : '' ?>>
                        Teknik Informatika
                    </option>

                </select>

            </div>


            <!-- TEXTAREA PESAN -->
            <div class="form-group">

                <label for="pesan">Pesan</label>

                <textarea
                    class="input-form"
                    id="pesan"
                    name="pesan"
                    maxlength="300"
                    placeholder="Tulis pesan Anda"
                    required><?= htmlspecialchars((string)$pesan, ENT_QUOTES, 'UTF-8') ?></textarea>

            </div>


            <p id="formFeedback" aria-live="polite"></p>

            <button type="submit">Kirim</button>

            <button type="reset">Batal</button>

        </form>


        <!-- MENAMPILKAN DATA YANG DITERIMA PELADEN -->
        <?php if (isset($_GET['nama'])): ?>

            <h3>Data yang Diterima Peladen</h3>

            <p>
                Nama:
                <?= htmlspecialchars((string)$nama, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Email:
                <?= htmlspecialchars((string)$email, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Semester:
                <?= htmlspecialchars((string)$semesterInput, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Tanggal kunjungan:
                <?= htmlspecialchars((string)$tanggal, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Jenis pesan:
                <?= htmlspecialchars((string)$jenisPesan, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Program studi:
                <?= htmlspecialchars((string)$prodi, ENT_QUOTES, 'UTF-8') ?>
            </p>


            <p>Minat:</p>

            <?php if (count($minat) > 0): ?>

                <ul>
                    <?php foreach ($minat as $topik): ?>

                        <li>
                            <?= htmlspecialchars((string)$topik, ENT_QUOTES, 'UTF-8') ?>
                        </li>

                    <?php endforeach; ?>
                </ul>

            <?php else: ?>

                <p>Tidak ada minat yang dipilih.</p>

            <?php endif; ?>


            <p>Pesan:</p>

            <p>
                <?= nl2br(htmlspecialchars((string)$pesan, ENT_QUOTES, 'UTF-8')) ?>
            </p>

        <?php endif; ?>

    </section>

</main>


<!-- FOOTER -->
<footer>

    <p>
        &copy; <?= date("Y") ?>

        <?= htmlspecialchars($namaMahasiswa, ENT_QUOTES, 'UTF-8') ?>

        [<?= htmlspecialchars($nim, ENT_QUOTES, 'UTF-8') ?>]
    </p>

</footer>


<script src="script.js"></script>
<script>
document.getElementById("formPeminjaman")
.addEventListener("submit", function(event) {

    let nama = document.querySelector('[name="nama"]').value.trim();
    let nim = document.querySelector('[name="nim"]').value.trim();
    let fasilitas = document.querySelector('[name="fasilitas"]').value;

    if (nama === "" || nim === "" || fasilitas === "") {
        alert("Semua data wajib diisi!");
        event.preventDefault();
        return;
    }

    if (!/^[0-9]+$/.test(nim)) {
        alert("NIM harus berupa angka!");
        event.preventDefault();
    }
});
</script>

</body>
</html>
