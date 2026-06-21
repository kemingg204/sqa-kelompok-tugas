# Cause-Effect Relationship Testing

**Sesuai Materi:** Pembagian spesifikasi menjadi bagian-bagian yang sesuai dengan kebutuhan, kemudian tentukan cause dan effect berdasarkan spesifikasi kebutuhan.

## Cause-Effect Table – Transaksi Penjualan

| Cause (Penyebab) | Effect (Akibat) |
|------------------|-----------------|
| Keranjang kosong | ❌ Error: "Keranjang kosong" |
| Bayar < total | ❌ Error: "Uang tidak cukup" |
| Jumlah > stok | ❌ Error: "Stok tidak mencukupi" |
| Jumlah = 0 | ❌ Error validasi |
| Jumlah negatif | ❌ Error validasi |
| Semua input valid | ✅ Transaksi berhasil, stok berkurang |
| Metode QRIS dipilih | ✅ QR Code muncul |
| Metode Debit dipilih | ✅ Alert tap kartu |

## Kesimpulan
✅ Cause-Effect Testing berfungsi dengan baik.
