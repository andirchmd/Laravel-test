@extends('layouts.global')
@section('title')
    Login Admin
@endsection
@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#1D2022]">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">Login as Admin</h1>
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
        <form method="POST" action="{{ route('login.action') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input id="username" placeholder="admin" type="username" name="username" required autofocus class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input id="password" placeholder="admin" type="password" name="password" required class="mt-1 p-2 w-full border rounded-md">
            </div>

            <button type="submit" class="w-full p-2 text-white rounded-md hover:bg-opacity-90 bg-[#1D2022]" style="">Login</button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-gray-600 text-sm">Login as user? <a href="{{ route('user.login') }}" class="text-gray-800 hover:underline">Click Here</a></p>
        </div>
    </div>
</div>
@endsection
