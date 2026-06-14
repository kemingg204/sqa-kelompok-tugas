# Matrix Testing

## Tujuan
Menguji interaksi antar parameter dalam bentuk tabel matriks.

## Studi Kasus
Pencarian Kursi (Fitur Search)

## Parameter dan Kondisi
| Parameter | Kondisi 1 | Kondisi 2 | Kondisi 3 |
|-----------|-----------|-----------|-----------|
| Nama Kursi | Huruf kecil | Huruf besar | Campuran |
| Kategori | Kantor | Rumah | Gaming |
| Harga | < 1jt | 1-2jt | > 2jt |

## Tabel Matriks
| Test Case | Nama Kursi | Kategori | Harga | Hasil | Status |
|-----------|------------|----------|-------|-------|--------|
| TC-MX-01 | "kursi kantor" | Kantor | 1.250.000 | Ditemukan | ✅ Pass |
| TC-MX-02 | "KURSI KANTOR" | Kantor | 1.250.000 | Ditemukan | ✅ Pass |
| TC-MX-03 | "Kursi Kantor" | Kantor | 1.250.000 | Ditemukan | ✅ Pass |
| TC-MX-04 | "kursi gaming" | Gaming | 2.750.000 | Ditemukan | ✅ Pass |
| TC-MX-05 | "kursi cafe" | cafe  | 750.000 | Ditemukan | ✅ Pass |

## Kesimpulan
✅ Pencarian kursi case-insensitive, semua kombinasi berhasil.
