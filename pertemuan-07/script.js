const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
  const isOpen = navMenu.classList.toggle("nav-open");

  navToggle.setAttribute("aria-expanded", isOpen);
  navToggle.setAttribute(
    "aria-label",
    isOpen ? "Tutup navigasi" : "Buka navigasi"
  );
});

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

contactForm.addEventListener("submit", (event) => {
  formFeedback.className = "form-feedback-error";

  const nama = namaInput.value.trim();
  let pesanError = "";

  if (nama.length < 3 || nama.length > 50) {
    pesanError = "Nama lengkap harus diisi 3 sampai 50 karakter.";
  } else {
    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const semester = Number(semesterInput.value);
    const jenisPesan = document.querySelector(
      'input[name="jenis_pesan"]:checked'
    );
    const topikDipilih = document.querySelectorAll(
      'input[name="minat"]:checked'
    );
    const pesan = pesanInput.value.trim();

    if (!emailPattern.test(email)) {
      pesanError = "Masukkan alamat email yang valid.";
    } else if (
      semesterInput.value === "" ||
      semester < 1 ||
      semester > 14
    ) {
      pesanError = "Semester harus diisi dengan angka 1 sampai 14.";
    } else if (tanggalInput.value === "") {
      pesanError = "Tanggal kunjungan harus diisi.";
    } else if (!jenisPesan) {
      pesanError = "Pilih jenis pesan.";
    } else if (topikDipilih.length === 0) {
      pesanError = "Pilih minimal satu topik yang diminati.";
    } else if (prodiInput.value === "") {
      pesanError = "Pilih program studi.";
    } else if (pesan.length === 0) {
      pesanError = "Pesan harus diisi.";
    } else if (pesan.length > 300) {
      pesanError = "Pesan maksimal 300 karakter.";
    }
  }

  if (pesanError) {
    event.preventDefault();
    formFeedback.textContent = pesanError;
    return;
  }
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});