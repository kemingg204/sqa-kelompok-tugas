# Equivalence Partitioning (EP)

**Sesuai Materi:** EP digunakan untuk mencari seluruh kesalahan atau kehilangan dalam fungsi. Keadaan masukan bisa berupa range, harga khusus, suatu kumpulan atau boolean.

## Field Harga Kursi

| Kelas | Nilai | Valid/Invalid | Expected | Status |
|-------|-------|---------------|----------|--------|
| EC1 | 1 - 100.000.000 | Valid ✅ | Tersimpan | ✅ Pass |
| EC2 | 0 | Invalid ❌ | Error | ✅ Pass |
| EC3 | Negatif | Invalid ❌ | Error | ✅ Pass |
| EC4 | > 100.000.000 | Invalid ❌ | Error | ✅ Pass |

## Field Jumlah Transaksi (Stok=10)

| Kelas | Nilai | Valid/Invalid | Expected | Status |
|-------|-------|---------------|----------|--------|
| EC1 | 1 - 10 | Valid ✅ | Sukses | ✅ Pass |
| EC2 | 0 | Invalid ❌ | Error | ✅ Pass |
| EC3 | Negatif | Invalid ❌ | Error | ✅ Pass |
| EC4 | 11 | Invalid ❌ | Error | ✅ Pass |

## Kesimpulan
✅ Equivalence Partitioning berfungsi dengan baik.
