@extends('layouts.global')
@section('title')
    Add Order
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-[#1D2022]">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-semibold text-gray-700 mb-4">Buat Order</h1>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <a href="/"><button type="submit" class="w-full p-2 text-white rounded-md hover:bg-opacity-70 mb-2" style="background-color: #1D2022;">Kembali</button></a>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('user.order.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-600">User</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" disabled value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-4">
                    <label for="nama_game" class="block text-sm font-medium text-gray-600">Nama Game</label>
                    <select id="nama_game" name="nama_game" class="mt-1 p-2 w-full border rounded-md">
                        <option value="" selected disabled>Pilih Game</option>
                        <option value="Genshin Impact">Genshin Impact</option>
                        <option value="Arknights">Arknights</option>
                        <option value="Mobile Legends: Bang-Bang">Mobile Legends: Bang-Bang</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="file_name" class="block text-sm font-medium text-gray-600">Upload Gambar Akun</label>
                    <input type="file" name="file_name" id="file_name" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-600">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="mt-1 p-2 w-full border rounded-md max-h-40" rows="4"></textarea>
                </div>

                <button type="submit" class="w-full p-2 text-white rounded-md hover:bg-opacity-70" style="background-color: #1D2022;">Tambah</button>
            </form>
        </div>
    </div>
@endsection
