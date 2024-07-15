<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Untung Terus - Penjualan Beras</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom CSS -->
    <link href="frontend/styles.css" rel="stylesheet">
</head>
<body class="antialiased text-gray-900">

    <!-- Navbar -->
<nav class="bg-gray-800 p-4 fixed w-full z-10 top-0 animate__animated animate__fadeInDown">
    <div class="container flex justify-between items-center">
        <a href="#" class="text-white text-xl font-bold">PT. Untung Terus</a>
        <!-- Mobile Menu Button -->
        <div class="lg:hidden">
            <button id="mobile-menu-toggle" class="text-gray-300 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <!-- Desktop Menu -->
        <div class="hidden lg:flex lg:items-center lg:w-auto space-x-6">
            <a href="#hero" class="text-gray-300 hover:text-white text-sm">Home</a>
            <a href="#tentang" class="text-gray-300 hover:text-white text-sm">Tentang Kami</a>
            <a href="#produk" class="text-gray-300 hover:text-white text-sm">Produk</a>
            <a href="#pemesanan" class="text-gray-300 hover:text-white text-sm">Pesan</a>
            <a href="#kontak" class="text-gray-300 hover:text-white text-sm">Kontak</a>
        </div>

        <!-- Additional Section -->
        <header class="grid grid-cols-2 items-center lg:grid-cols-3">
            @if (Route::has('login'))
                <nav class="-mx-10 flex flex-1 justify-end items-center"> <!-- menyesuaikan justify-end dan items-center -->
                    @auth
                        <!-- Hanya menampilkan Logout ketika sudah login -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-white text-sm px-3 py-2">
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- Menampilkan Link Login dan Register ketika belum login -->
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white text-sm px-3 py-2">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-300 hover:text-white text-sm px-3 py-2">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    </div>
</nav>



    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="bg-black bg-opacity-50 p-8 rounded-lg text-center animate__animated animate__fadeInUp">
            <h1 class="text-4xl text-white font-bold mb-4">Selamat Datang di PT. Untung Terus</h1>
            <p class="text-lg text-white">Kami Menyediakan Beras Berkualitas Terbaik</p>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-16 h-screen relative overflow-hidden flex justify-center items-center">
        <div class="container mx-auto flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-8 text-center lg:text-left">
            <!-- Bagian Teks -->
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold mb-8 animate__animated animate__fadeInUp">Tentang Kami</h2>
                <p class="text-lg text-gray-700 animate__animated animate__fadeInUp">PT. Untung Terus merupakan
                    perusahaan yang bergerak di bidang penjualan beras berkualitas. Kami berkomitmen untuk menyediakan
                    beras dengan kualitas terbaik untuk memenuhi kebutuhan Anda.</p>
            </div>
            <!-- Bagian Gambar -->
            <div class="lg:w-1/2">
                <img src="frontend/assets/img/beras-tentang.jpg" alt="PT. Untung Terus - Tentang Kami"
                    class="w-full h-auto rounded-lg shadow-md animate__animated animate__fadeInRight">
            </div>
        </div>
    </section>

    <!-- Produk Section -->
    <section id="produk" class="py-16 bg-gray-100">
        <div class="container mx-auto animate__animated animate__fadeInUp">
            <h2 class="text-3xl font-bold text-center mb-8">Produk Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="frontend/assets/img/beras-premium.jpg" alt="Beras Premium" class="w-full h-auto object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Beras Premium</h3>
                        <p class="text-gray-600">Rp 12.000/kg</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="frontend/assets/img/beras-medium.jpg" alt="Beras Medium" class="w-full h-auto object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Beras Medium</h3>
                        <p class="text-gray-600">Rp 10.000/kg</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="frontend/assets/img/beras-ekonom.jpg" alt="Beras Ekonomis" class="w-full h-auto object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Beras Ekonomis</h3>
                        <p class="text-gray-600">Rp 8.000/kg</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Pemesanan Section -->
    <section id="pemesanan" class="py-16">
        <div class="container mx-auto animate__animated animate__fadeInUp">
            <h2 class="text-3xl font-bold text-center mb-8">Form Pemesanan</h2>
            @auth
            <form id="orderForm" method="POST" action="{{ route('order.submit') }}"
                class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Nama Anda" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-2 border rounded-lg @error('phone') border-red-500 @enderror"
                        placeholder="Nomor Telepon Anda" required>
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                    <textarea id="address" name="address"
                        class="w-full px-4 py-2 border rounded-lg @error('address') border-red-500 @enderror"
                        placeholder="Alamat Anda" required></textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="products" class="block text-gray-700 font-semibold mb-2">Pilih Produk</label>
                    @php
                        $productPrices = config('product_prices');
                    @endphp
                    @foreach($productPrices as $productName => $productPrice)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="{{ $productName }}" name="products[]" value="{{ $productName }}"
                                data-price="{{ $productPrice }}" onchange="updateQuantityName(this)">
                            <label for="{{ $productName }}" class="ml-2">{{ $productName }} - Rp {{ number_format($productPrice, 0, ',', '.') }}/kg</label>
                            <input type="number" name="quantities[{{ $productName }}]" min="1"
                                class="w-20 px-2 py-1 border rounded-lg ml-2 quantity-input hidden" placeholder="Masukkan jumlah (kg)">
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700">Pesan
                        Sekarang</button>
                </div>
            </form>
            @else
            <div class="text-center">
                <p class="text-lg text-gray-700 mb-4">Silakan <a href="{{ route('login') }}"
                        class="text-blue-600 hover:underline">login</a> untuk melakukan pemesanan.</p>
            </div>
            @endauth
            @if (Session::has('success'))
                <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-lg">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-16">
        <div class="container mx-auto animate__animated animate__fadeInUp">
            <h2 class="text-3xl font-bold text-center mb-8">Kontak Kami</h2>
            <div class="flex flex-col items-center">
                <p class="text-lg text-gray-700 text-center mb-4">Jika Anda memiliki pertanyaan atau ingin informasi
                    lebih lanjut, silakan hubungi kami.</p>
                <p class="text-gray-600"><i class="fas fa-phone-alt mr-2"></i> (021) 123-4567</p>
                <p class="text-gray-600"><i class="fas fa-envelope mr-2"></i> info@untungterus.com</p>
                <p class="text-gray-600"><i class="fas fa-map-marker-alt mr-2"></i> Jl. Padi No. 10, Jakarta</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p class="mb-2">&copy; 2023 PT. Untung Terus. All rights reserved.</p>
        <p class="mb-2">Follow us on:</p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <!-- Animate CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('frontend/main.js') }}"></script>
    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        function updateQuantityName(checkbox) {
            var quantityInput = checkbox.parentNode.querySelector('input[type="number"]');
            if (checkbox.checked) {
                quantityInput.name = 'quantities[' + checkbox.value + ']';
            } else {
                quantityInput.name = '';
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.hash === '#whatsapp') {
                window.location.href = "{{ route('after-whatsapp') }}";
            }
        });
    </script>
    <script>
        function updateQuantityName(checkbox) {
            var quantityInput = checkbox.parentNode.querySelector('.quantity-input');
            if (checkbox.checked) {
                quantityInput.classList.remove('hidden');
                quantityInput.name = 'quantities[' + checkbox.value + ']';
            } else {
                quantityInput.classList.add('hidden');
                quantityInput.name = '';
            }
        }
    </script>
</body>

</html>
