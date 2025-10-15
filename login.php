<?php
session_start();

// =======================
// DAFTAR USER (contoh)
// =======================
// Format: 'email' => 'password'
// NOTE: Ini menyimpan password dalam plaintext (TIDAK AMAN untuk produksi).
$users = [
    "rwteam@gmail.com"        => "12345",
    "aniq11@rwteam.com"        => "aniq999",
    "ali22@rwteam.com"        => "ali999",
    "andre2@rwteam.com"        => "andre555",
    "thoriq33@rwteam.com"        => "thoriq555",
    "febri344@rwteam.com"        => "febri666",
    "syihab77@rwteam.com"        => "syihab666",
    "ebi234@rwteam.com"        => "ebi555",
    "ipur158@rwteam.com"        => "ipur111",
    "jeffry335@rwteam.com"        => "jeffry111",
    "msbro33@rwteam.com"       => "msbrow333"
];

// Ambil data dari form, gunakan null-coalescing untuk mencegah notice
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Simple validation
if ($email === '' || $password === '') {
    echo "<script>
            alert('Mohon isi email dan password.');
            window.location.href = 'index.html';
          </script>";
    exit;
}

// Cek apakah email ada di daftar dan password cocok
if (array_key_exists($email, $users) && $users[$email] === $password) {
    // Login berhasil
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;

    // Redirect ke dashboard (bisa diganti ke dashboard.php jika Anda pakai PHP di sana)
    header("Location: dashboard.html");
    exit;
} else {
    // Login gagal
    echo "<script>
            alert('ID Team atau Password salah!');
            window.location.href = 'index.html';
          </script>";
    exit;
}
?>
