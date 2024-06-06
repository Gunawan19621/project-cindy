<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BELUM JADI YA!</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      background-color: #f4f4f4;
    }

    nav {
      background-color: #333;
      padding: 15px;
      width: 100%;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      position: fixed;
      top: 0;
      z-index: 1000;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      margin: 0 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: #555;
    }

    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 20px;
      margin-top: 100px;
    }

    .product-item {
      position: relative;
      overflow: hidden;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .product-item:hover {
      transform: scale(1.05);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-info {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .product-item:hover .product-info {
      opacity: 1;
    }
  </style>
</head>
<body>
  <nav>
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#contact">Contact</a>
    <!-- Tambahkan elemen dropdown ke dalam navigasi -->
    @if (Route::has('login'))
      <div class="dropdown">
        @auth
          <!-- Jika pengguna sudah login -->
          <a href="#" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
          <div class="dropdown-content">
            <!-- Tambahkan item dropdown sesuai kebutuhan -->
            <a href="#" class="dropdown-item">Profile</a>
            <a href="#" class="dropdown-item">Settings</a>
            <a href="#" class="dropdown-item">Logout</a>
          </div>
        @else
          <!-- Jika pengguna belum login -->
          <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif
        @endauth
      </div>
    @endif
  </nav>
  <div class="product-container">
    <!-- Produk Pertama -->
    <div class="product-item">
      <img src="gambar-produk1.jpg" alt="Produk 1" class="product-image">
      <div class="product-info">
        <h3>Nama Produk 1</h3>
        <p>Harga: $50</p>
      </div>
    </div>

    <!-- Produk Kedua -->
    <div class="product-item">
      <img src="gambar-produk2.jpg" alt="Produk 2" class="product-image">
      <div class="product-info">
        <h3>Nama Produk 2</h3>
        <p>Harga: $75</p>
      </div>
    </div>

    <!-- Tambahkan produk lainnya sesuai kebutuhan -->
  </div>
</body>
</html>
