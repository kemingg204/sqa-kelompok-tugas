# Boundary Value Analysis (BVA)

**Sesuai Materi:** BVA digunakan untuk validasi fungsionalitas sistem berdasarkan persyaratan dan spesifikasi, dengan menganalisis Nilai Batas (Min, Max, ±1).

## Field Harga Kursi (Min=1, Max=100.000.000)

| Boundary | Nilai | Expected Result | Status |
|----------|-------|-----------------|--------|
| Min-1 | 0 | ❌ Error | ✅ Pass |
| Min | 1 | ✅ Sukses | ✅ Pass |
| Min+1 | 2 | ✅ Sukses | ✅ Pass |
| Max-1 | 99.999.999 | ✅ Sukses | ✅ Pass |
| Max | 100.000.000 | ✅ Sukses | ✅ Pass |
| Max+1 | 100.000.001 | ❌ Error | ✅ Pass |

## Field Jumlah Transaksi (Stok=10)

| Boundary | Nilai | Expected Result | Status |
|----------|-------|-----------------|--------|
| Min-1 | 0 | ❌ Error | ✅ Pass |
| Min | 1 | ✅ Sukses | ✅ Pass |
| Min+1 | 2 | ✅ Sukses | ✅ Pass |
| Max-1 | 9 | ✅ Sukses | ✅ Pass |
| Max | 10 | ✅ Sukses | ✅ Pass |
| Max+1 | 11 | ❌ Error | ✅ Pass |

## Kesimpulan
✅ Boundary Value Analysis berfungsi dengan baik.
