<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Kelulusan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-6 sm:py-10 bg-cover bg-no-repeat bg-[center_20%] sm:bg-[center_40%]"
      style="background-image: url('/bg.jpeg');">   <!-- CARD CONTAINER -->
    <div class="w-full max-w-md">

        <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl p-5 sm:p-6">

            <!-- HEADER -->
            <div class="text-center mb-5 sm:mb-6">

                <div class="flex items-center justify-center gap-2 mb-3">
                    <img src="/logo.png" class="w-9 h-9 sm:w-10 sm:h-10 object-contain">
                    <span class="text-xl sm:text-2xl">🎓</span>
                </div>

                <h1 class="text-lg sm:text-xl font-bold text-gray-800">
                    Pengumuman Kelulusan
                </h1>

                <p class="text-xs sm:text-sm text-gray-500">
                    SMKS Salafiyah Syafiiyah
                </p>

            </div>

            <!-- ERROR MESSAGE -->
            @if(session('error'))
                <div class="bg-red-100 text-red-600 text-xs sm:text-sm p-3 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('cek.hasil') }}" class="space-y-3 sm:space-y-4">
                @csrf

                <!-- NISN -->
                <div>
                    <label class="text-xs sm:text-sm text-gray-600">NISN</label>
                    <input type="text" name="nisn"
                        placeholder="Masukkan NISN"
                        class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg border border-gray-300 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- NAMA -->
                <div>
                    <label class="text-xs sm:text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama"
                        placeholder="Masukkan Nama"
                        class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg border border-gray-300 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-white text-indigo-600 font-semibold py-2.5 sm:py-3 rounded-lg shadow hover:bg-gray-100 active:scale-[0.98] transition text-sm sm:text-base">
                    Cek Kelulusan
                </button>

            </form>

            <!-- FOOTER -->
            <p class="text-center text-[10px] sm:text-xs text-gray-400 mt-5 sm:mt-6">
                © {{ date('Y') }} Rizalmahendra
            </p>

        </div>

    </div>

</body>
</html>