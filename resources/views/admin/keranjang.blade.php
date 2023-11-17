@extends('layouts.global')
@section('title')
Dashboard - Customer
@endsection

@section('content')
<div class="flex h-screen bg-gray-100">
  <!-- Sidebar/Navbar -->
  <div class="flex w-64 flex-col bg-white shadow-md">
    <!-- Sidebar Admin -->
    <div class="flex h-20 items-center justify-center shadow-md">
      <div class="flex items-center">
        <img class="mr-2 h-10 w-10 rounded-full" src="https://placeholder.co/100" alt="Admin Photo" />
        <span class="text-xl font-bold text-gray-700">Admin</span>
      </div>
    </div>

    <!-- Sidebar content -->
    <div class="flex-1 overflow-y-auto">
      <!-- Navigation items -->
      <a href="{{ Route('admin.dashboard') }}" class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Dashboard</a>
      <a href="{{ Route('admin.customer') }}" class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Customer</a>
      <a href="#" class="active mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-400 hover:text-black">Keranjang</a>
      <!-- TBA -->
    </div>
  </div>

  <!-- Main content -->
  <div class="flex flex-1 flex-col overflow-hidden">
    <header class="flex items-center justify-between border-b-4 border-[#B27423] bg-white p-6">
      <div class="flex items-center">
        <h2 class="text-xl font-semibold text-gray-800">List Keranjang Customer</h2>
      </div>
      <div class="flex items-center justify-end pr-6">
        <a href="{{ route('logout') }}">
            <button type="submit" class="text-sm text-white hover:text-black hover:bg-gray-400 cursor-pointer bg-[#B27423] py-1 px-3 rounded-md">
                Logout
            </button>
        </a>
    </div>
    </header>
    <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
      <!-- Table -->
      <div class="container mx-auto p-6">
        <div class="mb-8 w-full overflow-hidden rounded-lg shadow-lg">
          <div class="w-full">
            <table class="w-full">
              <thead>
                <tr class="text-md border-b border-gray-600 bg-gray-100 text-left font-semibold uppercase tracking-wide text-gray-900">
                  <th class="px-4 py-3">ID</th>
                  <th class="px-4 py-3">Nama Depan</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($keranjang as $krj)
                <tr class="text-gray-700">
                  <td class="border px-4 py-3">{{ $krj['id'] }}</td>
                  <td class="border px-4 py-3">{{ $krj->customer->nama_depan }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection