
@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Kelola Buku Tamu
    </h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">No.</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Pesan</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse ($daftar_pesan as $pesan)
                    <tr>
                        <td class="px-4 py-3">
                            {{ $daftar_pesan->firstItem() + $loop->index }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $pesan->nama }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $pesan->email }}
                        </td>

                        <td class="px-4 py-3 whitespace-pre-line break-words">
                            {{ $pesan->pesan }}
                        </td>

                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $pesan->created_at?->format('d M Y, H:i') }}
                        </td>

                        <td class="px-4 py-3">
                            <form
                                action="{{ route('bukutamu.admin.destroy', $pesan) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Belum ada pesan tamu.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $daftar_pesan->links() }}
    </div>

</div>
@endsection
