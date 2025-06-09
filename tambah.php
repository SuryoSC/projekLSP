<?php include "config.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    mysqli_query($koneksi, "INSERT INTO siswa (nama, nisn, kelas, jurusan) VALUES ('$nama', '$nisn', '$kelas', '$jurusan')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">➕ Tambah Data Siswa</h2>
        <form method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">NISN</label>
                <input type="text" name="nisn" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Kelas</label>
                <select name="kelas" id="kelas" class="w-full px-4 py-2 border rounded" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Jurusan</label>
                <select name="jurusan" id="jurusan" class="w-full px-4 py-2 border rounded" required>
                    <option value="">-- Pilih Jurusan --</option>
                </select>
            </div>
            <div class="flex justify-between mt-6">
                <a href="index.php" class="text-gray-600 hover:text-gray-900">← Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>

<script>
    const jurusanMap = {
        X: ['TM', 'TO', 'TE', 'TKL', 'PPLG'],
        XI: ['TAV', 'TEI', 'TITL', 'TP', 'TKR', 'TSM', 'RPL'],
        XII: ['TAV', 'TEI', 'TITL', 'TP', 'TKR', 'TSM', 'RPL']
    };

    const kelasSelect = document.getElementById('kelas');
    const jurusanSelect = document.getElementById('jurusan');

    function updateJurusan() {
        const selectedKelas = kelasSelect.value;
        jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';
        if (jurusanMap[selectedKelas]) {
            jurusanMap[selectedKelas].forEach(j => {
                const opt = document.createElement('option');
                opt.value = j;
                opt.textContent = j;
                jurusanSelect.appendChild(opt);
            });
        }
    }

    kelasSelect.addEventListener('change', updateJurusan);
</script>

</body>
</html>
