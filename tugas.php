<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tugas Praktikum 7</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .output-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            width: 300px;
        }

        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 180px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Form Input Data Karyawan</h2>

    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required><br>

        <label for="pekerjaan">Pekerjaan:</label>
        <select id="pekerjaan" name="pekerjaan" required>
            <option value="">-- Pilih Pekerjaan --</option>
            <option value="manager">Manager</option>
            <option value="programmer">Programmer</option>
            <option value="designer">Designer</option>
            <option value="staff">Staff Administrasi</option>
        </select><br>

        <input type="submit" value="Tampilkan Data">
    </form>

    <?php
    // Check if the form has been submitted (by checking if the POST data exists)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $nama = $_POST['nama'];
        $tgl_lahir_str = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // --- 1. Age Calculation ---

        // Convert date string to DateTime objects
        $tgl_lahir = new DateTime($tgl_lahir_str);
        $today = new DateTime('today');

        // Calculate the difference (interval) between the two dates
        $umur_interval = $today->diff($tgl_lahir);

        // Get the years (age)
        $umur_tahun = $umur_interval->y;

        // --- 2. Salary Calculation based on Occupation ---
        $gaji = 0;

        // Determine salary using a switch-case conditional structure
        switch ($pekerjaan) {
            case 'manager':
                $gaji = 15000000;
                break;
            case 'programmer':
                $gaji = 8000000;
                break;
            case 'designer':
                $gaji = 7500000;
                break;
            case 'staff':
                $gaji = 4500000;
                break;
            default:
                $gaji = 0; // Default salary if no occupation is selected
        }

        // Format salary to Indonesian Rupiah (for better display)
        $gaji_rupiah = "Rp. " . number_format($gaji, 0, ',', '.');

        // Display the results
        echo "<div class='output-box'>";
        echo "<h3>Data Diri</h3>";
        echo "Nama: <strong>" . htmlspecialchars($nama) . "</strong><br>";
        echo "Tanggal Lahir: <strong>" . htmlspecialchars($tgl_lahir_str) . "</strong><br>";
        echo "Pekerjaan: <strong>" . htmlspecialchars(ucwords($pekerjaan)) . "</strong><br>";
        echo "Umur: <strong>" . htmlspecialchars($umur_tahun) . " tahun</strong><br>";
        echo "Gaji: <strong>" . htmlspecialchars($gaji_rupiah) . "</strong><br>";
        echo "</div>";
    }
    ?>

</body>

</html>