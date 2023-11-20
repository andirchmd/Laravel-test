@extends('layouts.global')
@section('title')
    Dashboard - Users
@endsection

@section('content')
    <div class="flex h-screen bg-gray-800 shadow-white">
        <!-- Sidebar/Navbar -->
        <div class="flex w-64 flex-col bg-gray-800 shadow-xl shadow-white">
            <!-- Sidebar Admin -->
            <div class="flex h-20 items-center justify-center shadow-md">
                <div class="flex items-center">
                    <a href="https://github.com/andirchmd"><img class="mr-2 h-10 w-10 rounded-full"
                            src="https://avatars.githubusercontent.com/andirchmd" alt="Admin Photo"></a>
                    <a href="/"><span class="text-xl font-bold text-white hover:text-gray-300">Admin</span></a>
                </div>
            </div>

            <!-- Sidebar content -->
            <div class="flex-1 overflow-y-auto">
                <!-- Navigation items -->
                <a href="{{ route('admin.dashboard') }}"
                    class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-gray-100 hover:text-gray-800">Dashboard</a>
                <a href="{{ route('admin.user') }}"
                    class="active mt-2 block rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-400 hover:text-black">Users</a>
                <a href="{{ route('admin.order') }}"
                    class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-white hover:bg-gray-100 hover:text-gray-800">List
                    Order</a>
                <!-- TBA -->
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden shadow-md">
            <header class="flex items-center justify-between border-b-4 border-gray-400 bg-gray-800 p-6">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold text-white">List Users</h2>
                </div>
                <div class="flex items-center justify-end pr-6">
                    <a href="{{ route('logout') }}">
                        <button type="submit"
                            class="text-sm text-white hover:bg-opacity-60 cursor-pointer bg-red-800 py-1 px-3 rounded-md">
                            Logout
                        </button>
                    </a>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-600">
                <div class="container mx-auto p-6">
                    <div class="mb-8 w-full overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-md border-b border-gray-300 bg-gray-800 text-left font-semibold uppercase tracking-wide text-gray-100">
                                        <th class="px-4 py-3">ID</th>
                                        <th class="px-4 py-3">Nama</th>
                                        <th class="px-4 py-3">Username</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Akun Dibuat</th>
                                        <th class="px-4 py-3">Akun Diubah</th>
                                        <th class="px-4 py-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-700 text-white">
                                    @foreach ($user as $ur)
                                        <tr class="text-white">
                                            <td class="border border-gray-800 px-4 py-3">{{ $ur['id'] }}</td>
                                            <td class="border border-gray-800 px-4 py-3">{{ $ur['name'] }}</td>
                                            <td class="border border-gray-800 px-4 py-3">{{ $ur['username'] }}</td>
                                            <td class="border border-gray-800 px-4 py-3">{{ $ur['email'] }}</td>
                                            <td class="border border-gray-800 px-4 py-3">
                                                {{ \Carbon\Carbon::parse($ur['created_at'])->format('H:i - j F Y') }}</td>
                                            <td class="border border-gray-800 px-4 py-3">
                                                {{ \Carbon\Carbon::parse($ur['updated_at'])->format('H:i - j F Y') }}</td>
                                            <td class="border border-gray-800 px-4 py-3">
                                                <div class="w-full h-auto flex gap-2 justify-center">
                                                    {{-- <a href="{{ route('admin.user.edit', $ur->id) }}"
                                                        class="p-2 bg-yellow-300 rounded-md hover:bg-yellow-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            viewBox="0 -960 960 960" width="24" class="fill-yellow-700">
                                                            <path
                                                                d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z" />
                                                        </svg>
                                                    </a> --}}
                                                    <form action="{{ route('admin.user.delete', $ur->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="p-2 bg-red-600 rounded-md hover:bg-red-700"
                                                            onclick="return confirm('Are you sure want to delete {{ $ur->name }}?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                viewBox="0 -960 960 960" width="24"
                                                                class="fill-red-100">
                                                                <path d="M280-120q-33
                                                                                    0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5
                                                                                    56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160
                                                                                    0h80v-360h-80v360ZM280-720v520-520Z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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
