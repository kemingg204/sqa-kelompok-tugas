# Issue Tracking – CV Rofile Chetose

---

## Daftar Issue

| ID Issue | Deskripsi | Status | Prioritas | Resolusi |
|----------|-----------|--------|-----------|----------|
| BUG-001 | Stok tidak berkurang setelah transaksi Cash | ✅ Closed | High | Perbaiki variabel `$kursi_id` di `proses_transaksi.php` |
| BUG-002 | Export PDF error untuk data >100 record | 🔄 Open | Medium | Perlu pagination |
| BUG-003 | Validasi harga negatif tidak ada | ✅ Closed | High | Tambah validasi IF harga <= 0 |
| BUG-004 | QRIS tidak muncul saat metode QRIS dipilih | ✅ Closed | High | Perbaiki modal QRIS |
| BUG-005 | Error handling query database tidak ada | 🔄 Open | Medium | Tambahkan `if(!mysqli_query(...))` |

---

## Detail Issue

### BUG-001: Stok Tidak Berkurang Setelah Transaksi

| Aspek | Keterangan |
|-------|-------------|
| **ID** | BUG-001 |
| **Tanggal Ditemukan** | 23 Juni 2026 |
| **Ditemukan Oleh** | SQ Tester |
| **Modul** | Transaksi Penjualan (`proses_transaksi.php`) |
| **Prioritas** | High |
| **Status** | ✅ Closed |

**Langkah Reproduksi:**
1. Login sebagai kasir
2. Pilih kursi "Kursi Kantor" (stok=10)
3. Input jumlah = 1
4. Pilih metode Cash
5. Bayar Rp1.250.000
6. Klik Proses

**Hasil Aktual:** Alert "Transaksi Berhasil" muncul, tapi stok tetap 10.

**Hasil Diharapkan:** Stok berkurang menjadi 9.

**Penyebab:** Variabel `$kursi_id` tidak terdefinisi di query update stok.

**Resolusi:** Perbaiki query update stok menggunakan `$item['id']`.

---

### BUG-003: Validasi Harga Negatif Tidak Ada

| Aspek | Keterangan |
|-------|-------------|
| **ID** | BUG-003 |
| **Tanggal Ditemukan** | 23 Juni 2026 |
| **Ditemukan Oleh** | SQ Tester |
| **Modul** | Form Tambah Kursi (Admin) |
| **Prioritas** | High |
| **Status** | ✅ Closed |

**Langkah Reproduksi:**
1. Login sebagai admin
2. Buka form tambah kursi
3. Input harga = -100.000
4. Klik Simpan

**Hasil Aktual:** Data tersimpan dengan harga negatif.

**Hasil Diharapkan:** Muncul error "Harga harus > 0".

**Resolusi:** Tambahkan validasi `IF harga <= 0` di server-side.

---

## Ringkasan Issue

| Status | Jumlah |
|--------|--------|
| ✅ Closed | 3 |
| 🔄 Open | 2 |
| **Total** | **5** |
