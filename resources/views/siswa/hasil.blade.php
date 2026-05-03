<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kelulusan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>

<body class="bg-gradient-to-br from-indigo-600 via-blue-500 to-sky-400 min-h-screen flex items-center justify-center text-gray-800">

    <!-- CARD -->
    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center relative overflow-hidden">

            <!-- LOADING -->
            <div id="loading" class="flex flex-col items-center justify-center py-10">
                <span class="loading loading-spinner loading-lg text-primary"></span>
                <p class="mt-4 text-gray-500">Memproses hasil...</p>
            </div>

            <!-- RESULT (hidden dulu) -->
            <div id="result" class="hidden">

                <h2 class="text-xl font-bold mb-2">
                    🎓 Hasil Kelulusan
                </h2>

                <p class="mb-1 font-semibold text-gray-700">
                    {{ $siswa->nama }}
                </p>

                <p class="mb-4 text-sm text-gray-500">
                    {{ $siswa->nisn }}
                </p>

                @if($siswa->status == 'lulus')
                    <div id="statusText" class="text-green-600 text-4xl font-extrabold mb-4">
                        🎉 LULUS 🎉
                    </div>
                @else
                    <div id="statusText" class="text-red-600 text-4xl font-extrabold mb-4">
                        ❌ TIDAK LULUS ❌
                    </div>
                @endif

                <a href="{{ route('cek.form') }}"
                   class="btn bg-gray-800 text-white hover:bg-gray-900 border-none mt-2">
                    Kembali
                </a>

            </div>

        </div>

    </div>

    <!-- CONFETTI LIB -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
    const status = "{{ $siswa->status }}"; // ambil langsung dari backend

    setTimeout(() => {
        document.getElementById('loading').style.display = 'none';

        let result = document.getElementById('result');
        result.classList.remove('hidden');
        result.classList.add('fade-in');

        // 🎉 hanya kalau lulus
        if (status === "lulus") {
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 }
            });
        }

    }, 1500);
</script>

</body>
</html>