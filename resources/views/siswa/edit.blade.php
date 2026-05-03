<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Siswa
        </h2>
    </x-slot>

    <div class="p-6 flex justify-center">

        <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8">

            <h2 class="text-lg font-bold mb-6 text-gray-700 text-center">
                Form Edit Siswa
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

            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- NAMA -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Nama
                    </label>
                    <input type="text" name="nama"
                        value="{{ old('nama', $siswa->nama) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base leading-relaxed text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        required>
                </div>

                <!-- NISN -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        NISN
                    </label>
                    <input type="text" name="nisn"
                        value="{{ old('nisn', $siswa->nisn) }}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base leading-relaxed text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
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
                        <option value="lulus" {{ old('status', $siswa->status) == 'lulus' ? 'selected' : '' }}>
                            Lulus
                        </option>
                        <option value="tidak" {{ old('status', $siswa->status) == 'tidak' ? 'selected' : '' }}>
                            Tidak Lulus
                        </option>

                    </select>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('siswa.index') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 shadow transition">
                        Update
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>