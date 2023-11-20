@extends('layouts.global')
@section('title')
    Pilih User
@endsection
@section('content')
<div class="bg-[#1D2022] flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <div class="text-center mb-6">
            <span class="text-2xl font-bold">Login sebagai</span>
        </div>
        <div class="flex justify-between">
            <div class="flex items-center hover:scale-105">
                <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 3 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9C7.686 9 5 11.686 5 15v4h14v-4c0-3.314-2.686-6-6-6zM5 17v4h14v-4m0 0H5m0 0l2-3h10l2 3"></path></svg>
                <a href='{{ route('login') }}' class="font-bold">Admin</a>
            </div>
            <div class="flex items-center hover:scale-105">
                <a href='{{ route('user.login') }}' class="font-bold">User</a>
                <svg class="w-6 h-6 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
            </div>
        </div>
    </div>
</div>
@endsection
