@extends('layouts.global')
@section('title')
Dashboard
@endsection

@section('content')

<div class="flex h-screen bg-gray-100 shadow-white">
  <!-- Sidebar/Navbar -->
  <div class="flex w-64 flex-col bg-gray-800 shadow-xl shadow-white">
    <!-- Sidebar Admin -->
    <div class="flex h-20 items-center justify-center shadow-md">
      <div class="flex items-center">
        <a href="https://github.com/andirchmd"><img class="mr-2 h-10 w-10 rounded-full" src="https://avatars.githubusercontent.com/andirchmd" alt="Admin Photo"></a>
        <a href="/"><span class="text-xl font-bold text-white hover:text-gray-300">Admin</span></a>
      </div>
    </div>

    <!-- Sidebar content -->
    <div class="flex-1 overflow-y-auto">
      <!-- Navigation items -->
      <a href="{{ route('admin.dashboard') }}" class="active mt-2 block rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-400 hover:text-black">Dashboard</a>
      <a href="{{ route('admin.user') }}" class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-gray-100 hover:text-gray-800">Users</a>
      <a href="{{ route('admin.order') }}" class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-gray-100 hover:text-gray-800">List Order</a>
      <!-- TBA -->
    </div>
  </div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden shadow-md">
        <header class="flex items-center justify-between border-b-4 border-gray-400 bg-gray-800 p-6">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold text-white">Dashboard</h2>
            </div>
            <div class="flex items-center justify-end pr-6">
                <a href="{{ route('logout') }}">
                    <button type="submit" class="text-sm text-white hover:bg-opacity-60 cursor-pointer bg-red-800 py-1 px-3 rounded-md">
                        Logout
                    </button>
                </a>
            </div>
        </header>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-600 p-6">
            <!-- Cards for statistics -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card 1 -->
                <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-md">
                    <div class="p-3 mr-4 text-gray-600 bg-gray-700 rounded-full">
                        <!-- Replace with your icon or image -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="..."></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Total User
                        </p>
                        <p class="text-lg font-semibold text-gray-100" id="totalCustomers">
                            {{ $totalUsers }}
                        </p>
                    </div>

                </div>
                <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-md">
                    <div class="p-3 mr-4 text-gray-600 bg-gray-700 rounded-full">
                        <!-- Replace with your icon or image -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="..."></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Total Order
                        </p>
                        <p class="text-lg font-semibold text-gray-100" id="totalCustomers">
                            {{ $totalOrders }}
                        </p>
                    </div>

                </div>

                <!-- ... TBA ... -->
            </div>
        </main>
    </div>
</div>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
