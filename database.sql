CREATE DATABASE IF NOT EXISTS lsp_crud;

USE lsp_crud;

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nisn VARCHAR(20),
    kelas VARCHAR(10),
    jurusan VARCHAR(50)
);
