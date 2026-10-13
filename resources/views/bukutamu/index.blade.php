
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Buku Tamu
        </h1>

        <p class="text-gray-600 mb-6">
            Silakan tinggalkan pesan, saran, atau masukan untuk SMP Mentari.
        </p>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bukutamu.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block font-semibold text-gray-700 mb-2">
                    Nama
                </label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    required
                    maxlength="255"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama Anda"
                >
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold text-gray-700 mb-2">
                    Email
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    maxlength="255"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="nama@email.com"
                >
            </div>

            <div class="mb-6">
                <label for="pesan" class="block font-semibold text-gray-700 mb-2">
                    Pesan
                </label>
                <textarea
                    id="pesan"
                    name="pesan"
                    rows="5"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Tuliskan pesan Anda..."
                >{{ old('pesan') }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md"
            >
                Kirim Pesan
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Pesan Pengunjung
        </h2>

        @forelse ($daftar_pesan as $pesan)
            <div class="border-b border-gray-200 py-4 last:border-b-0">
                <div class="flex flex-col sm:flex-row sm:justify-between mb-2">
                    <h3 class="font-bold text-gray-800">
                        {{ $pesan->nama }}
                    </h3>

                    <span class="text-sm text-gray-500">
                        {{ $pesan->created_at?->format('d M Y, H:i') }}
                    </span>
                </div>

                <p class="text-gray-600 whitespace-pre-line break-words">{{ $pesan->pesan }}</p>
            </div>
        @empty
            <p class="text-gray-500">
                Belum ada pesan. Jadilah pengunjung pertama yang meninggalkan pesan!
            </p>
        @endforelse
    </div>

</div>
@endsection
