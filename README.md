# 📘 CRUD Data Siswa - PHP & MySQL

Aplikasi web sederhana untuk mengelola data siswa (Create, Read, Update, Delete) menggunakan **PHP Native**, **MySQL**, dan **Tailwind CSS**.

---

## 🖼️ Tampilan Index

- Responsive design (Tailwind CSS)
- Form dinamis: jurusan berubah berdasarkan kelas yang dipilih
- Tabel data siswa lengkap dengan fitur edit dan hapus

---

## 📂 Struktur File

```
crud-siswa/
├── config.php         # Koneksi database
├── index.php          # Halaman utama: tampilkan data siswa
├── tambah.php         # Form tambah data siswa
├── edit.php           # Form edit data siswa
├── hapus.php          # Proses hapus data siswa
├── database.sql       # File untuk import database
```

---

## 🧱 Struktur Database

**Nama database:** `crud_siswa`  
**Nama tabel:** `siswa`

Import file `databse.sql` untuk membuat database dan tabel yang diperlukan.

```sql
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nisn VARCHAR(20),
    kelas ENUM('X','XI','XII'),
    jurusan VARCHAR(50)
);
```

---

## 🔄 Fitur CRUD

| Fitur        | Deskripsi                                       |
|--------------|-------------------------------------------------|
| **Create**   | Tambah data siswa via `tambah.php`              |
| **Read**     | Tampilkan semua data di `index.php`             |
| **Update**   | Edit data siswa di `edit.php`                   |
| **Delete**   | Hapus data dengan konfirmasi via `hapus.php`    |

---

## 🎯 Dropdown Dinamis

- Jika memilih kelas **X**, maka jurusan yang muncul:
  - `TM`, `TO`, `TE`, `TKL`, `PPLG`
- Jika memilih kelas **XI/XII**, maka jurusan:
  - `TAV`, `TEI`, `TITL`, `TP`, `TKR`, `TSM`, `RPL`

Dropdown jurusan akan berubah otomatis berdasarkan pilihan kelas dengan **JavaScript**.

---

## 🚀 Cara Menjalankan

1. Import database:
   - Buat database `crud_siswa`
   - Import file `databse.sql` ke dalam database
2. Atur `config.php` sesuai konfigurasi MySQL lokal:
   ```php
   mysqli_connect("localhost", "root", "", "crud_siswa");
   ```
3. Jalankan file `index.php` melalui server lokal (XAMPP/Laragon/etc)

---

## 🧰 Tools yang Digunakan

- PHP 7+
- MySQL
- Tailwind CSS (via CDN)
- JavaScript (untuk dropdown dinamis)

---

