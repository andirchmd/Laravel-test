@extends('layouts.global')
@section('title')
    Edit
@endsection
@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#B27423]">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">Edit Customer</h1>
        <form method="post" action="{{ route('customer.update', $customers->id) }}">
            @csrf

            <div class="mb-4">
                <label for="nama_depan" class="block text-sm font-medium text-gray-600">Nama Depan</label>
                <input id="nama_depan" type="text" name="nama_depan" value="{{ $customers->nama_depan }}" required autofocus class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="nama_belakang" class="block text-sm font-medium text-gray-600">Nama Belakang</label>
                <input id="nama_belakang" type="text" name="nama_belakang" value="{{ $customers->nama_belakang }}"required class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input id="email" type="email" name="email" value="{{ $customers->email }}" required class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="nomor_hp" class="block text-sm font-medium text-gray-600">Nomor HP</label>
                <input id="nomor_hp" type="number" name="nomor_hp" value="{{ $customers->nomor_hp }}" required class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                <textarea id="alamat" name="alamat" required class="mt-1 p-2 w-full border rounded-md"> {{ $customers->alamat }}</textarea>
            </div>

            <button type="submit" class="w-full p-2 text-white rounded-md bg-[#B27423] hover:bg-opacity-90">Ubah</button>
        </form>
    </div>
</div>
@endsection
