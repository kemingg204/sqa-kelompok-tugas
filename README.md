# 🪑 KursiKita - Software Quality Assurance Documentation

## Platform Penjualan Kursi Online · Laravel & React.js

---

| Attribute | Detail |
|-----------|--------|
| **Platform** | Web Application |
| **Tech Stack** | HTML, CSS, JavaScript (Frontend) · MySQL (Database) |
| **Metodologi** | Agile / Iterative Development |
| **Standar QA** | SDLC-based · Black-box & White-box Testing |
| **Mata Kuliah** | Software Quality Assurance |
| **Institusi** | Universitas Kebangsaan Republik Indonesia |

---

> *"Quality is not an act, it is a habit." — Aristotle*

---

## 📋 Daftar Isi

- [About The Project](#about-the-project)
- [Tim SQA KursiKita](#tim-sqa-kursikita)
- [Repository Structure](#repository-structure)
- [Scope of Testing](#scope-of-testing)
- [Testing Tools & Stack](#testing-tools--stack)
- [Getting Started](#getting-started)
- [Testing Progress](#testing-progress)
- [Documents Overview](#documents-overview)

---

## 📖 About The Project

**KursiKita** adalah platform e-commerce khusus penjualan kursi online yang dirancang untuk memudahkan pelanggan membeli kursi, admin mengelola toko, dan owner melihat laporan penjualan.

| Fitur Utama | Deskripsi |
|-------------|-----------|
| 🪑 Katalog Kursi | Lihat, cari, dan filter kursi berdasarkan kategori |
| 🛒 Keranjang Belanja | Tambah, ubah jumlah, hapus kursi sebelum checkout |
| 💳 Checkout | Pilih metode pembayaran (Transfer Bank / COD) |
| 📦 Retur | Pengajuan pengembalian barang maksimal 14 hari |
| 📊 Laporan | Laporan penjualan dan stok untuk admin & owner |

Repositori ini didedikasikan sepenuhnya untuk keperluan **Software Quality Assurance (SQA)** – mencakup dokumentasi rekayasa perangkat lunak, perencanaan pengujian sistematis, pelacakan defect, dan pelaporan hasil uji.

---

## 👥 Tim SQA KursiKita

| NIM | Nama | Peran | Fokus Kontribusi |
|-----|------|------|------------------|
| 12345678 | Andi Saputra | Team Leader & SQA Engineer | Manajemen proyek, koordinasi tim, eksekusi test case |
| 12345679 | Budi Santoso | QA Analyst & Tester | Analisis kebutuhan, validasi fungsionalitas, pelacakan bug |
| 12345680 | Citra Dewi | Technical Writer | Dokumentasi teknis, penyusunan SRS & Test Plan |

---

## 📁 Repository Structure
kursikita-sqa/
├── README.md
├── Software Requirements Specification/
│ ├── 01_DAFTAR_ISI.md
│ ├── BAB1_PENDAHULUAN.md
│ ├── BAB2_DESKRIPSI_SISTEM.md
│ ├── BAB3_KEBUTUHAN_FUNGSIONAL.md
│ ├── BAB4_KEBUTUHAN_NON_FUNGSIONAL.md
│ └── BAB5_VERIFIKASI.md
├── Software Design Documentation/
│ ├── 01_DAFTAR_ISI.md
│ ├── ERD_Diagram.md
│ ├── UML_UseCase.md
│ ├── UML_Activity.md
│ └── UI_UX_Design.md
├── Software User Documentation/
│ ├── 01_DAFTAR_ISI.md
│ ├── Panduan_Registrasi_Login.md
│ ├── Panduan_Belanja.md
│ ├── Panduan_Checkout.md
│ └── Panduan_Retur.md
├── Test Plan/
│ ├── 01_DAFTAR_ISI.md
│ ├── Test_Scenarios.md
│ ├── Test_Cases.md
│ ├── Bug_Report.md
│ └── Test_Execution_Result.md
└── src/
├── index.html
├── style.css
├── script.js
├── keranjang.html
├── login.html
└── register.html

---

## 🎯 Scope of Testing

| # | Modul              | Fokus Pengujian                                      | Kekritisan |
|---|--------------------|------------------------------------------------------|------------|
| 1 | Autentikasi        | Registrasi, login, verifikasi email                 | Critical   |
| 2 | Kelola Kursi       | Tampil, cari, filter, tambah, edit, hapus kursi     | High       |
| 3 | Keranjang Belanja  | Tambah, ubah jumlah, hapus, hitung total            | High       |
| 4 | Checkout           | Ringkasan pesanan, metode bayar, simpan order       | Critical   |
| 5 | Retur              | Ajukan retur, upload bukti, setujui/tolak admin     | Medium     |

---

## 🛠️ Testing Tools & Stack

### Frontend & UI Testing
| Tool                  | Kegunaan                            |
|-----------------------|-------------------------------------|
| Browser DevTools      | Inspeksi, debugging manual          |
| Selenium / Katalon    | Opsional (automation UI)            |

### Manajemen & Pelaporan
| Tool                  | Kegunaan                            |
|-----------------------|-------------------------------------|
| GitHub Issues         | Pelacakan bug                       |
| GitHub Projects       | Manajemen sprint (opsional)         |
| Markdown Reports      | Dokumentasi hasil test              |


