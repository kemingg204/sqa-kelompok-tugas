# Robustness Testing

**Sesuai Materi:** Data masukan diambil dari luar spesifikasi yang didefinisikan. Robustness testing ditujukan sebagai pembuktian bahwa tidak terdapat kesalahan apabila terdapat masukan yang tidak valid.

## Skenario Pengujian

| Skenario | Input | Expected | Status |
|----------|-------|----------|--------|
| Jumlah melebihi batas | 999999999 | ❌ Error | ✅ Pass |
| Karakter khusus di nama | "@#$%" | Bisa disimpan | ✅ Pass |
| SQL Injection | '; DROP TABLE kursi;-- | Data aman | ✅ Pass |
| XSS Attack | `<script>alert(1)</script>` | Tidak tereksekusi | ✅ Pass |

## Kesimpulan
✅ Robustness Testing berfungsi dengan baik.
