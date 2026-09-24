# Hasil Pengujian Prepared Statement

## Lingkungan Pengujian

- Web server: XAMPP
- Bahasa pemrograman: PHP
- Database: MySQL
- Metode query: PDO Prepared Statement
- Database: mini_riset_sql_injection
- Tabel: users

## Hasil Pengujian

| No. | Skenario | Input | Hasil |
|---:|---|---|---|
| 1 | Input normal | `andi` | Data `andi` tampil |
| 2 | Karakter khusus | `'` | User tidak ditemukan |
| 3 | Input logika SQL | `' OR '1'='1` | User tidak ditemukan |
| 4 | Input logika SQL | `' OR 1=1` | User tidak ditemukan |

## Catatan

Pengujian dilakukan pada aplikasi lokal menggunakan XAMPP.
Hasil di atas merupakan hasil observasi pada implementasi
Prepared Statement.