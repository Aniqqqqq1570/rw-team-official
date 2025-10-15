<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika belum login, arahkan ke halaman login
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard RW Team</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <!-- ========== SIDEBAR ========== -->
    <aside class="sidebar">
      <div class="logo-area">
        <img src="logo.png" alt="Logo RW Team">
        <h2>RW Team</h2>
      </div>
      <nav>
        <ul>
          <li class="active" data-section="home">🏠 Home</li>
          <li data-section="profile">👤 Profil</li>
          <li data-section="settings">⚙️ Pengaturan</li>
        </ul>
      </nav>
      <a href="logout.php" class="logout">Keluar</a>
    </aside>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="content">
      <section id="home" class="active-section">
        <h1>Selamat Datang, <?php echo $_SESSION['email']; ?>!</h1>
        <p>Ini adalah halaman utama dashboard kamu.</p>
      </section>

      <section id="profile">
        <h1>Profil</h1>
        <p>Di sini kamu bisa melihat dan mengubah data profil tim kamu.</p>
      </section>

      <section id="settings">
        <h1>Pengaturan</h1>
        <p>Atur preferensi, tema, dan keamanan akun kamu di sini.</p>
      </section>
    </main>
  </div>

  <script>
    // Navigasi antar menu
    const menuItems = document.querySelectorAll(".sidebar nav ul li");
    const sections = document.querySelectorAll("main section");

    menuItems.forEach(item => {
      item.addEventListener("click", () => {
        menuItems.forEach(li => li.classList.remove("active"));
        item.classList.add("active");

        sections.forEach(sec => {
          sec.classList.remove("active-section");
          if (sec.id === item.dataset.section) sec.classList.add("active-section");
        });
      });
    });
  </script>
</body>
</html>
