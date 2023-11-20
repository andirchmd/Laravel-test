@extends('layouts.global')
@section('title')
    Register
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-[#1D2022]">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-semibold text-gray-700 mb-4">Register</h1>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('register.action') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input id="name" type="text" name="name" placeholder="name..." required autofocus
                        class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                    <input id="username" type="text" name="username" placeholder="username..." required autofocus
                        class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input id="email" type="email" name="email" placeholder="email@example.com" required autofocus
                        class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" required
                        class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input id="confirm_password" type="password" placeholder="••••••••" name="confirm_password" required
                        class="mt-1 p-2 w-full border rounded-md">
                </div>

                <button type="submit" class="w-full p-2 text-white rounded-md hover:bg-opacity-70" style="background-color: #1D2022;">Register</button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-gray-600 text-sm">Already has an account? <a href="{{ route('user.login') }}"
                        class="text-[#1D2022] hover:underline">Click Here</a></p>
            </div>
        </div>
    </div>
@endsection
