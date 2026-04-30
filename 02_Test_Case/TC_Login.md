# Test Case - Modul Login

## TC-01: Login Admin Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Buka halaman login | - | Form login tampil |
| 2. Input username | admin | Data masuk |
| 3. Input password | admin123 | Data masuk |
| 4. Klik Login | - | Masuk ke dashboard admin |

## TC-02: Login Manager Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Input username | manager | Data masuk |
| 2. Input password | manager123 | Data masuk |
| 3. Klik Login | - | Masuk ke dashboard manager (laporan & grafik) |

## TC-03: Login Kasir Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Input username | kasir | Data masuk |
| 2. Input password | kasir123 | Data masuk |
| 3. Klik Login | - | Masuk ke halaman transaksi penjualan |

## TC-04: Login Staff Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Input username | staff | Data masuk |
| 2. Input password | staff123 | Data masuk |
| 3. Klik Login | - | Masuk ke halaman lihat stok |

## TC-05: Login Gagal Password Salah

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Input username benar | admin | Data masuk |
| 2. Input password salah | wrongpass | Data masuk |
| 3. Klik Login | - | Muncul pesan "Password salah" |
