<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kelulusan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 0.8s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>

<body class="bg-gradient-to-br from-indigo-600 via-blue-500 to-sky-400 min-h-screen flex items-center justify-center px-4 py-6">

    <!-- CARD -->
    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-2xl p-5 sm:p-6 text-center relative overflow-hidden">

            <!-- LOADING -->
            <div id="loading" class="flex flex-col items-center justify-center py-10 sm:py-12">
                <span class="loading loading-spinner loading-lg text-indigo-600"></span>
                <p class="mt-4 text-sm sm:text-base text-gray-500">
                    Memproses hasil...
                </p>
            </div>

            <!-- RESULT -->
            <div id="result" class="hidden">

                <!-- HEADER -->
                <h2 class="text-lg sm:text-xl text-black-500 font-bold mb-2">
                    🎓 Hasil Kelulusan
                </h2>

                <p class="font-semibold text-gray-700 text-sm sm:text-base">
                    {{ $siswa->nama }}
                </p>

                <p class="text-xs sm:text-sm text-gray-500 mb-4">
                    {{ $siswa->nisn }}
                </p>

                <!-- STATUS -->
                @if($siswa->status == 'lulus')
                    <div class="text-green-600 text-3xl sm:text-4xl font-extrabold mb-4">
                        🎉 LULUS 🎉
                    </div>
                @else
                    <div class="text-red-600 text-3xl sm:text-4xl font-extrabold mb-4">
                        ❌ TIDAK LULUS ❌
                    </div>
                @endif

                <!-- BUTTON -->
                <a href="{{ route('cek.form') }}"
                   class="inline-block w-full bg-gray-800 text-white py-2.5 sm:py-3 rounded-lg hover:bg-gray-900 active:scale-[0.98] transition text-sm sm:text-base">
                    Kembali
                </a>

            </div>

        </div>

    </div>

    <!-- CONFETTI -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        const status = "{{ $siswa->status }}";

        setTimeout(() => {
            document.getElementById('loading').style.display = 'none';

            const result = document.getElementById('result');
            result.classList.remove('hidden');
            result.classList.add('fade-in');

            // 🎉 confetti hanya jika lulus
            if (status === "lulus") {
                confetti({
                    particleCount: 150,
                    spread: 80,
                    origin: { y: 0.6 }
                });
            }

        }, 1200);
    </script>

</body>
</html>