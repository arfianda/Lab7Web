# 💻 Lab7Web: Praktikum PHP Dasar

## 🛠️ Persiapan dan Lingkungan Kerja (Preparation and Environment)

### 1. Web Server Setup (LAMP)

Karena saya menggunakan Linux maka web server stack yang saya gunakan adalah LAMP

<img src="/docs/lamp1.png" width="500">

<img src="/docs/lamp2.png" width="500">

Menandakan bahwa web server apache dan mysql sudah bekerja

## Latihan PHP dasar

### 1. PHP Dasar (Hello World)

<img src="/docs/phpdasar1.png" width="500">

### Output

<img src="/docs/output1.png" width="500">

### 2. Basic Variabel

<img src="/docs/basicvar.png" width="500">

### Output

<img src="/docs/output2.png" width="500">

### 3. Predefined Variabel

```php
<body>
     <h1>Predifine Variabel</h1>
    <?php
    echo 'Selamat Datang ' . $_GET['nama'];
    ?>
</body>
```

### Output

<img src="/docs/output3.png" width="500">

### 4. Form Input

```php
<body>
    <h2>Form Input</h2>
    <form method="post">
        <label>Nama: </label>
        <input type="text" name="nama">
        <input type="submit" value="Kirim">
    </form>
    <?php
    echo 'Selamat Datang ' . $_POST['nama'];
    ?>
</body>
```

### Output

<img src="/docs/output4.png" width="500">

### 5. Operator

```php
<body>
    <?php
    $gaji = 1000000;
    $pajak = 0.1;
    $thp = $gaji - ($gaji * $pajak);

    echo "Gaji sebelum pajak Rp. " . $gaji . " <br>";
    echo "Gaji yang dibawa pulang Rp. " . $thp;
    ?>
</body>
```

### Output

<img src="/docs/output5.png" width="500">

### 6. Struktur Kondisi (Conditional Structures)

#### Kondisi IF-ELSEIF-ELSE

```php
<?php
    $nama_hari = date("l");

    if ($nama_hari == "Sunday") {
        echo "Minggu";
    } elseif ($nama_hari == "Monday") {
        echo "Senin";
    } else {
        echo "Selasa";
    }
?>
```

#### Kondisi SWITCH

```php
<?php
    $nama_hari = date("l");
    switch ($nama_hari) {
        case "Sunday":
            echo "Minggu";
            break;
        case "Monday":
            echo "Senin";
            break;
        case "Tuesday":
            echo "Selasa";
            break;
        default:
            echo "Sabtu";
    }
?>
```

#### Output

<img src="/docs/conditional.png" width="500">

### 7. Perulangan

#### FOR

```php
<?php
    for ($i = 1; $i <= 10; $i++)
    {
        echo "Perulangan ke: " . $i . '<br />';
    }


    for ($i = 10; $i >= 1; $i--)
    {
        echo "Perulangan ke: " . $i . '<br />';
    }
?>
```

#### WHILE

```php
<?php
    $i = 1;
    while ($i <= 10) {
        echo "Perulangan ke: " . $i . " <br />";
        $i++;
    }
?>
```

#### DOWHILE

```php
<?php
    $i = 1;
    do {
        echo "Perulangan ke: " . $i . '<br />';
        $i++;
    } while ($i <= 10);
?>
```

#### Output

<img src="/docs/output6.png" width="500">

# Tugas Praktikum

## 1. Struktur Form dan Logika Input

Form HTML digunakan untuk mengambil data dari pengguna. Kami menggunakan metode POST untuk mengirimkan data ke halaman itu sendiri.

```php
<form method="post">
    </form>

<?php
    // Cek apakah form sudah disubmit dengan memeriksa apakah ada data yang dikirim melalui POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data yang dikirim dari form
        $nama = $_POST['nama'];
        $tgl_lahir_str = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // ... Lanjut ke perhitungan ...
    }
?>
```

## 2. Logika PHP: Perhitungan Umur dan Gaji

A. Menghitung Umur (Age Calculation)
Perhitungan umur dilakukan menggunakan Class DateTime PHP untuk mendapatkan hasil yang akurat, dengan membandingkan tanggal lahir dengan tanggal hari ini.

```php
<?php
    // ... di dalam blok POST ...

    // 1. Konversi string tanggal lahir menjadi objek DateTime.
    $tgl_lahir = new DateTime($tgl_lahir_str);
    $today = new DateTime('today');

    // 2. Hitung selisih (interval) antara tanggal lahir dan hari ini.
    $umur_interval = $today->diff($tgl_lahir);

    // 3. Ambil total tahun ('y') dari interval sebagai umur.
    $umur_tahun = $umur_interval->y;

    // ... Lanjut ke perhitungan gaji ...
?>
```

B. Menentukan Gaji Berdasarkan Pekerjaan (Salary Calculation)
Struktur kondisi switch digunakan untuk menetapkan nilai gaji yang berbeda berdasarkan nilai variabel $pekerjaan.

```php
<?php
    // ... di dalam blok POST ...

    $gaji = 0;

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
    }

    // Format gaji ke format Rupiah (e.g., Rp. 8.000.000)
    $gaji_rupiah = "Rp. " . number_format($gaji, 0, ',', '.');

    // ... Tampilkan Output ...
?>
```

## 3. Tampilan Hasil (Output)

Hasil perhitungan umur dan gaji ditampilkan bersama data input, menggunakan fungsi htmlspecialchars() untuk keamanan dan ucwords() untuk memformat pekerjaan.

```php
<?php
    // ... di dalam blok POST ...

    echo "<h3>Data Diri</h3>";
    echo "Nama: <strong>" . htmlspecialchars($nama) . "</strong><br>";
    echo "Tanggal Lahir: <strong>" . htmlspecialchars($tgl_lahir_str) . "</strong><br>";
    echo "Pekerjaan: <strong>" . htmlspecialchars(ucwords($pekerjaan)) . "</strong><br>";
    echo "Umur: <strong>" . htmlspecialchars($umur_tahun) . " tahun</strong><br>";
    echo "Gaji: <strong>" . htmlspecialchars($gaji_rupiah) . "</strong><br>";
?>
```

