# Hasil Pengujian Prepared Statement

## Lingkungan Pengujian

- Web server: XAMPP
- Bahasa pemrograman: PHP
- Database: MySQL/MariaDB
- Metode query: PDO Prepared Statement
- Database: mini_riset_sql_injection
- Tabel: users
- Parameter pencarian: id

## Hasil Pengujian

| No. | Skenario | Input | Hasil Observasi |
|---:|---|---|---|
| 1 | Input normal | `1` | ID 1 tampil |
| 2 | Input normal | `2` | ID 2 tampil |
| 3 | Karakter khusus | `'` | Data tidak ditemukan |
| 4 | Input logika SQL | `' OR '1'='1` | Data tidak ditemukan |
| 5 | Input logika SQL | `' OR 1=1` | Data tidak ditemukan |
| 6 | Input logika SQL tanpa tanda petik | `1 OR 1=1` | ID 1 tampil |

## Catatan

Pengujian dilakukan pada aplikasi lokal menggunakan XAMPP.

Pengujian menggunakan parameter `id` dengan database dan tabel
yang sama seperti implementasi Query Concatenation.

Pada input `1 OR 1=1`, implementasi Prepared Statement hanya
menampilkan ID 1 dan tidak menampilkan seluruh data pengguna.

Hasil tersebut dicatat berdasarkan observasi langsung selama
pengujian aplikasi.