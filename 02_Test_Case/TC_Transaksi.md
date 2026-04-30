# Test Case - Modul Transaksi Penjualan

## TC-TR-01: Transaksi Cash Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai kasir | username: kasir, password: kasir123 | Masuk halaman transaksi |
| 2. Pilih kursi | Kursi Kantor | Kursi masuk ke keranjang |
| 3. Input jumlah | 2 | Total harga = 2 x harga |
| 4. Pilih metode bayar | Cash | Form input uang customer muncul |
| 5. Input uang customer | 500000 (total 400000) | Kembalian = 100000 |
| 6. Klik Proses | - | Muncul invoice, stok berkurang |

---

## TC-TR-02: Transaksi Debit Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai kasir | username: kasir | Halaman transaksi |
| 2. Pilih kursi | Kursi Tamu | Kursi masuk keranjang |
| 3. Input jumlah | 1 | Total = harga kursi |
| 4. Pilih metode bayar | Debit | Muncul form kartu debit |
| 5. Klik Proses | - | Transaksi berhasil, stok berkurang |

---

## TC-TR-03: Transaksi QRIS Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai kasir | username: kasir | Halaman transaksi |
| 2. Pilih kursi | Kursi Taman | Kursi masuk keranjang |
| 3. Input jumlah | 3 | Total = 3 x harga |
| 4. Pilih metode bayar | QRIS | Muncul modal QR Code |
| 5. Klik Proses | - | Transaksi berhasil |

---

## TC-TR-04: Error Stok Tidak Cukup

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Pilih kursi dengan stok 5 | Kursi Kantor | Masuk keranjang |
| 2. Input jumlah | 10 | Muncul pesan "Stok tidak cukup" |
| 3. Proses gagal | - | Transaksi tidak jadi |

---

## TC-TR-05: Error Uang Kurang (Cash)

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Total belanja | 500000 | - |
| 2. Input uang customer | 400000 | Muncul pesan "Uang kurang" |
| 3. Proses gagal | - | Transaksi tidak jadi |
