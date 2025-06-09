<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <div class="max-w-5xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">📋 Data Siswa</h1>
                <a href="tambah.php" class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded shadow">
                    + Tambah Data
                </a>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 border">Nama</th>
                            <th class="px-4 py-3 border">NISN</th>
                            <th class="px-4 py-3 border">Kelas</th>
                            <th class="px-4 py-3 border">Jurusan</th>
                            <th class="px-4 py-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <?php
                        $result = mysqli_query($koneksi, "SELECT * FROM siswa");
                        if (mysqli_num_rows($result) == 0) {
                            echo "<tr><td colspan='5' class='text-center p-4 text-gray-500'>Belum ada data.</td></tr>";
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='hover:bg-gray-50 transition'>
                                    <td class='px-4 py-3 border'>{$row['nama']}</td>
                                    <td class='px-4 py-3 border'>{$row['nisn']}</td>
                                    <td class='px-4 py-3 border'>{$row['kelas']}</td>
                                    <td class='px-4 py-3 border'>{$row['jurusan']}</td>
                                    <td class='px-4 py-3 border text-center space-x-2'>
                                        <a href='edit.php?id={$row['id']}' class='inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded'>Edit</a>
                                        <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin hapus data ini?\")'
                                           class='inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded'>Hapus</a>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
