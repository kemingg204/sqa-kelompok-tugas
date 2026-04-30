# Software Design Documentation (SDD)
## CV Rofile Chetose - Sistem Penjualan Kursi

---

## DAFTAR ISI

1. Entity Relationship Diagram (ERD)
2. Use Case Diagram
3. Activity Diagram (Transaksi)
4. Class Diagram
5. Sequence Diagram (Login & Transaksi)
6. UI Mockup

---

## BAB 1: ENTITY RELATIONSHIP DIAGRAM (ERD)

```mermaid
erDiagram
    users ||--o{ transaksi : melakukan
    users {
        int id PK
        string username
        string password
        string email
        string nama_lengkap
        enum role
    }
    
    transaksi ||--|{ detail_transaksi : memiliki
    transaksi {
        int id PK
        string no_invoice
        datetime tanggal
        int user_id FK
        string customer_name
        int grand_total
        int bayar
        enum payment_method
        enum status
    }
    
    detail_transaksi }o--|| kursi : berisi
    detail_transaksi {
        int id PK
        int transaksi_id FK
        int kursi_id FK
        int jumlah
        int harga_jual
        int subtotal
    }
    
    kursi {
        int id PK
        string kode_kursi
        string nama_kursi
        string kategori
        int harga
        int stok
        int berat_kg
        string deskripsi
        string warna
    }
