<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Siswa
        </h2>
    </x-slot>

    <div class="p-6 flex justify-center">

        <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-lg font-bold mb-6 text-gray-700 text-center">
                Form Tambah Siswa
            </h2>

            <!-- ERROR -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- NAMA -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Nama
                    </label>
                    <input type="text" name="nama"
                        value="{{ old('nama') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base leading-relaxed text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        placeholder="Masukkan nama siswa"
                        required>
                </div>

                <!-- NISN -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        NISN
                    </label>
                    <input type="text" name="nisn"
                        value="{{ old('nisn') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base leading-relaxed text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        placeholder="Masukkan NISN"
                        required>
                </div>

                <!-- STATUS -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Status
                    </label>
                    <select name="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base leading-relaxed text-gray-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>
                        <option value="">-- Pilih Status --</option>
                        <option value="lulus">Lulus</option>
                        <option value="tidak">Tidak Lulus</option>
                    </select>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 shadow transition">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>