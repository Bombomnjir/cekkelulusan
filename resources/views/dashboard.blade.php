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

    <div class="p-4 sm:p-6">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
            <h1 class="text-xl sm:text-2xl font-bold">Dashboard Admin</h1>

            <a href="{{ route('siswa.create') }}"
               class="btn btn-primary w-full sm:w-auto">
                + Tambah Siswa
            </a>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">

            <div class="card bg-base-100 shadow">
                <div class="card-body p-4 sm:p-6">
                    <h2 class="text-sm sm:text-base font-semibold">Total Siswa</h2>
                    <p class="text-2xl sm:text-3xl font-bold">{{ $total }}</p>
                </div>
            </div>

            <div class="card bg-success text-white shadow">
                <div class="card-body p-4 sm:p-6">
                    <h2 class="text-sm sm:text-base font-semibold">Lulus</h2>
                    <p class="text-2xl sm:text-3xl font-bold">{{ $lulus }}</p>
                </div>
            </div>

            <div class="card bg-error text-white shadow">
                <div class="card-body p-4 sm:p-6">
                    <h2 class="text-sm sm:text-base font-semibold">Tidak Lulus</h2>
                    <p class="text-2xl sm:text-3xl font-bold">{{ $tidak }}</p>
                </div>
            </div>

        </div>

        <!-- SEARCH -->
        <form method="GET" class="mb-4">
            <input type="text" name="search"
                placeholder="Cari nama / NISN"
                class="input input-bordered w-full sm:max-w-xs text-sm sm:text-base">
        </form>

        <!-- TABLE CARD -->
        <div class="card bg-base-100 shadow">
            <div class="card-body p-4 sm:p-6">

                <h2 class="card-title mb-3 sm:mb-4 text-base sm:text-lg">
                    Data Siswa
                </h2>

                <!-- TABLE WRAPPER (IMPORTANT FOR HP SCROLL) -->
                <div class="overflow-x-auto">

                    <table class="table table-zebra min-w-[600px] sm:min-w-full text-xs sm:text-sm">

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
                                <td class="whitespace-nowrap">{{ $siswa->nama }}</td>
                                <td class="whitespace-nowrap">{{ $siswa->nisn }}</td>

                                <td>
                                    @if($siswa->status == 'lulus')
                                        <span class="badge badge-success text-xs">Lulus</span>
                                    @else
                                        <span class="badge badge-error text-xs">Tidak Lulus</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">

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
                                <td colspan="5" class="text-center text-sm py-4">
                                    Belum ada data siswa
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>

                <!-- PAGINATION -->
                <div class="mt-4 text-sm">
                    {{ $siswas->links() }}
                </div>

            </div>
        </div>

    </div>
</x-app-layout>