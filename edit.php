<?php include "config.php"; ?>
<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', nisn='$nisn', kelas='$kelas', jurusan='$jurusan' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">✏️ Edit Data Siswa</h2>
        <form method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">NISN</label>
                <input type="text" name="nisn" value="<?= $data['nisn'] ?>" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Kelas</label>
                <select name="kelas" id="kelas" class="w-full px-4 py-2 border rounded" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X" <?= $data['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
                    <option value="XI" <?= $data['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
                    <option value="XII" <?= $data['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Jurusan</label>
                <select name="jurusan" id="jurusan" class="w-full px-4 py-2 border rounded" required>
                </select>
            </div>
            <div class="flex justify-between mt-6">
                <a href="index.php" class="text-gray-600 hover:text-gray-900">← Kembali</a>
                <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Update</button>
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

    function updateJurusan(selectedJurusan = "") {
        const selectedKelas = kelasSelect.value;
        jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';
        if (jurusanMap[selectedKelas]) {
            jurusanMap[selectedKelas].forEach(j => {
                const opt = document.createElement('option');
                opt.value = j;
                opt.textContent = j;
                if (j === selectedJurusan) opt.selected = true;
                jurusanSelect.appendChild(opt);
            });
        }
    }

    kelasSelect.addEventListener('change', () => updateJurusan());

    window.addEventListener('DOMContentLoaded', () => {
        updateJurusan('<?= $data['jurusan'] ?>');
    });
</script>

</body>
</html>
