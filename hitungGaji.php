<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji Karyawan</title>
</head>
<body>
    <h1>Kalkulator Gaji Karyawan</h1>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="golongan">Golongan:</label>
        <select name="golongan" id="golongan">
            <option value="1">Golongan 1</option>
            <option value="2">Golongan 2</option>
            <option value="3">Golongan 3</option>
            <option value="4">Golongan 4</option>
        </select><br>

        <label for="jumlah_anak">Jumlah Anak:</label>
        <input type="number" name="jumlah_anak" id="jumlah_anak"><br>

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    // Memproses form jika tombol "Hitung" diklik
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $golongan = $_POST['golongan'];
        $jumlahAnak = $_POST['jumlah_anak'];

        // Menghitung gaji pokok berdasarkan golongan
        if ($golongan == 1) {
            $gajiPokok = 3000000;
        } elseif ($golongan == 2) {
            $gajiPokok = 4000000;
        } elseif ($golongan == 3) {
            $gajiPokok = 5000000;
        } elseif ($golongan == 4) {
            $gajiPokok = 6000000;
        } else {
            $gajiPokok = 0; // Jika golongan tidak valid, gaji pokok diatur ke 0
        }

        // Menghitung upah lembur
        $upahLemburPerJam = 100000;
        $jamLemburMaksimal = 20;

        // Menghitung tunjangan anak
        $tunjanganAnakPerAnak = 500000;
        $tunjanganAnakMaksimal = 3;
        $tunjanganAnak = min($jumlahAnak, $tunjanganAnakMaksimal) * $tunjanganAnakPerAnak;

        // Menghitung total gaji
        $totalGaji = $gajiPokok + $tunjanganAnak;

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan Gaji:</h2>";
        echo "Nama: " . $nama . "<br>";
        echo "Golongan: " . $golongan . "<br>";
        echo "Gaji Pokok: " . number_format($gajiPokok, 0, ',', '.') . "<br>";
        echo "Tunjangan Anak: " . number_format($tunjanganAnak, 0, ',', '.') . "<br>";
        echo "Total Gaji: " . number_format($totalGaji, 0, ',', '.');
    }
    ?>
</body>
</html>