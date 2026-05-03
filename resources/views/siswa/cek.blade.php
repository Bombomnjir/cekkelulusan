<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Kelulusan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-600 via-blue-500 to-sky-400 flex items-center justify-center px-4">

    <!-- CARD -->
    <div class="w-full max-w-md">

        <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl p-6">

            <!-- HEADER -->
            <div class="text-center mb-6">
               <div class="flex items-center justify-center gap-2 mb-3">
    <img src="/logo.png" class="w-10 h-10 object-contain">
    <span class="text-2xl">🎓</span>
</div>

                <h1 class="text-xl font-bold text-gray-800">
                    Pengumuman Kelulusan
                </h1>

                <p class="text-sm text-gray-500">
                    SMKS Salafiyah Syafiiyah
                </p>

            </div>

            <!-- ERROR -->
            @if(session('error'))
                <div class="alert alert-error mb-4 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('cek.hasil') }}" class="space-y-4">
                @csrf

                <!-- NISN -->
                <div>
                    <label class="text-sm text-gray-600">NISN</label>
                    <input type="text" name="nisn"
                        placeholder="Masukkan NISN"
                        class="input input-bordered w-full mt-1 focus:outline-none focus:ring-2 focus:ring-primary"
                        required>
                </div>

                <!-- NAMA -->
                <div>
                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama"
                        placeholder="Masukkan Nama"
                        class="input input-bordered w-full mt-1 focus:outline-none focus:ring-2 focus:ring-primary"
                        required>
                </div>

                <!-- BUTTON -->
                <button class="w-full bg-white text-indigo-600 font-semibold py-3 rounded-lg shadow hover:bg-gray-100 transition">
                     Cek Kelulusan
                </button>

            </form>

            <!-- FOOTER -->
            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} Rizalmahendra
            </p>

        </div>

    </div>

</body>
</html>