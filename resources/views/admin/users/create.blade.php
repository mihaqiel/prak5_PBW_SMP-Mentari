
@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Tambah Pengguna</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}"
          method="POST"
          class="bg-white p-6 rounded shadow space-y-4">
        @csrf

        <div>
            <label for="name" class="block mb-1">Nama</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name') }}" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="email" class="block mb-1">Email</label>
            <input id="email" name="email" type="email"
                   value="{{ old('email') }}" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="password" class="block mb-1">Password</label>
            <input id="password" name="password" type="password"
                   required minlength="8"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="password_confirmation" class="block mb-1">
                Konfirmasi Password
            </label>
            <input id="password_confirmation"
                   name="password_confirmation"
                   type="password" required minlength="8"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="role" class="block mb-1">Role</label>
            <select id="role" name="role" required
                    class="w-full border rounded p-2">
                <option value="user" @selected(old('role', 'user') === 'user')>
                    User
                </option>
                <option value="admin" @selected(old('role') === 'admin')>
                    Admin
                </option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
            <a href="{{ route('admin.users.index') }}"
               class="bg-gray-200 px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
