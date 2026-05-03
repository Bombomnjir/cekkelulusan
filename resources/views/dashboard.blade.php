<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Dashboard Admin</h1>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Total Siswa</h2>
                    <p class="text-3xl font-bold">{{ $total }}</p>
                </div>
            </div>

            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h2 class="card-title">Lulus</h2>
                    <p class="text-3xl font-bold">{{ $lulus }}</p>
                </div>
            </div>

            <div class="card bg-error text-white shadow">
                <div class="card-body">
                    <h2 class="card-title">Tidak Lulus</h2>
                    <p class="text-3xl font-bold">{{ $tidak }}</p>
                </div>
            </div>

        </div>

        <!-- SEARCH -->
        <form method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Cari nama / NISN"
                class="input input-bordered w-full max-w-xs">
        </form>

        <!-- TABLE -->
        <div class="card bg-base-100 shadow">
            <div class="card-body">

                <h2 class="card-title mb-4">Data Siswa</h2>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">

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

                                <td class="flex gap-2">

                                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada data siswa
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="mt-4">
                    {{ $siswas->links() }}
                </div>

            </div>
        </div>

    </div>
</x-app-layout>