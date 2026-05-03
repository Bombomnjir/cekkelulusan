<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success mb-4 text-xs sm:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- WRAPPER FIX (INI PENTING BANGET) -->
    <div class="flex justify-center px-3 sm:px-6 py-4">

        <div class="w-full max-w-6xl">

            <!-- HEADER -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
                <h1 class="text-xl sm:text-2xl font-bold">Dashboard Admin</h1>

                <a href="{{ route('siswa.create') }}"
                   class="btn btn-primary w-full sm:w-auto">
                    + Tambah Siswa
                </a>
            </div>

            <!-- STATS -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-6">

                <div class="card bg-base-100 shadow">
                    <div class="card-body p-4">
                        <h2 class="text-sm font-semibold">Total Siswa</h2>
                        <p class="text-2xl font-bold">{{ $total }}</p>
                    </div>
                </div>

                <div class="card bg-success text-white shadow">
                    <div class="card-body p-4">
                        <h2 class="text-sm font-semibold">Lulus</h2>
                        <p class="text-2xl font-bold">{{ $lulus }}</p>
                    </div>
                </div>

                <div class="card bg-error text-white shadow">
                    <div class="card-body p-4">
                        <h2 class="text-sm font-semibold">Tidak Lulus</h2>
                        <p class="text-2xl font-bold">{{ $tidak }}</p>
                    </div>
                </div>

            </div>

            <!-- SEARCH -->
            <form method="GET" class="mb-4">
                <input type="text" name="search"
                    placeholder="Cari nama / NISN"
                    class="input input-bordered w-full sm:max-w-xs text-sm">
            </form>

            <!-- TABLE -->
            <div class="card bg-base-100 shadow">
                <div class="card-body p-4">

                    <h2 class="card-title mb-4 text-base sm:text-lg">
                        Data Siswa
                    </h2>

                    <div class="overflow-x-auto">

                        <!-- IMPORTANT: FIX TABLE WIDTH -->
                        <table class="table table-zebra w-full text-sm">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($siswas as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->nisn }}</td>

                                    <td>
                                        @if($siswa->status == 'lulus')
                                            <span class="badge badge-success">Lulus</span>
                                        @else
                                            <span class="badge badge-error">Tidak Lulus</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="flex flex-col sm:flex-row gap-2">

                                            <a href="{{ route('siswa.edit', $siswa->id) }}"
                                               class="btn btn-warning btn-xs sm:btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-error btn-xs sm:btn-sm w-full sm:w-auto"
                                                    onclick="return confirm('Yakin hapus data?')">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6">
                                        Belum ada data siswa
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                    <div class="mt-4">
                        {{ $siswas->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>