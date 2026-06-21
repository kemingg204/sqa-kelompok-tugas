# Comparison Testing

**Sesuai Materi:** Uji tiap versi, yang bertujuan untuk menjamin keseluruhan versi mendapatkan hasil yang sama dengan data uji yang sama.

## Versi yang Dibandingkan

| Versi | Database | Hasil Transaksi |
|-------|----------|-----------------|
| Localhost | MySQL Lokal | ✅ Berhasil |
| Azure | MySQL Cloud | ✅ Berhasil |

## Hasil
| Skenario | Localhost | Azure | Status |
|----------|-----------|-------|--------|
| Transaksi Cash | ✅ | ✅ | Sama |
| Transaksi Debit | ✅ | ✅ | Sama |
| Transaksi QRIS | ✅ | ✅ | Sama |

## Kesimpulan
✅ Comparison Testing berfungsi dengan baik.
