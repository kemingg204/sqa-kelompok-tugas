# Decision Table Testing

**Sesuai Materi:** Pengujian gabungan dari berbagai kondisi dalam pengambilan keputusan, digunakan pada uji software dalam verifikasi input yang beragam.

## Studi Kasus: Transaksi Penjualan

| Kondisi/Aksi | TC1 | TC2 | TC3 | TC4 |
|--------------|-----|-----|-----|-----|
| C1: Keranjang kosong? | T | F | F | F |
| C2: Bayar cukup? | - | T | F | T |
| C3: Stok cukup? | - | T | T | F |
| A1: Error "Keranjang kosong" | ✅ | - | - | - |
| A2: Error "Uang tidak cukup" | - | - | ✅ | - |
| A3: Error "Stok tidak cukup" | - | - | - | ✅ |
| A4: Transaksi berhasil | - | ✅ | - | - |

**T = True, F = False**

## Kesimpulan
✅ Decision Table Testing berfungsi dengan baik.
