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
                <a href="{{ Route('admin.dashboard') }}"
                    class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="#"
                    class="active mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-400 hover:text-black">Customer</a>
                <a href="{{ Route('admin.keranjang') }}"
                    class="mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">Keranjang</a>
                <!-- TBA -->
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <header class="flex items-center justify-between border-b-4 border-[#B27423] bg-white p-6">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Customers</h2>
                </div>
                <div class="flex items-center justify-end pr-6">
                    <a href="{{ route('logout') }}">
                        <button type="submit"
                            class="text-sm text-white hover:text-black hover:bg-gray-400 cursor-pointer bg-[#B27423] py-1 px-3 rounded-md">
                            Logout
                        </button>
                    </a>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
                <div class="container mx-auto p-6">
                    <div class="mb-8 w-full overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-md border-b border-gray-600 bg-gray-100 text-left font-semibold uppercase tracking-wide text-gray-900">
                                        <th class="px-4 py-3">ID</th>
                                        <th class="px-4 py-3">Nama Depan</th>
                                        <th class="px-4 py-3">Nama Belakang</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Nomor HP</th>
                                        <th class="px-4 py-3">Alamat</th>
                                        <th class="px-4 py-3"><a href="{{ route('customer.add') }}"><button
                                                    class="px-4 py-2 bg-[#B27423] hover:bg-opacity-70 rounded-md text text-white">Tambah</button></a>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($customer as $cst)
                                        <tr class="text-gray-700">
                                            <td class="border px-4 py-3">{{ $cst['id'] }}</td>
                                            <td class="border px-4 py-3">{{ $cst['nama_depan'] }}</td>
                                            <td class="border px-4 py-3">{{ $cst['nama_belakang'] }}</td>
                                            <td class="border px-4 py-3">{{ $cst['email'] }}</td>
                                            <td class="border px-4 py-3">{{ $cst['nomor_hp'] }}</td>
                                            <td class="border px-4 py-3">{{ $cst['alamat'] }}</td>
                                            <td class="border px-4 py-3">
                                                <div class="w-full h-auto flex gap-2 justify-center">
                                                    <a href="{{ route('customer.edit', $cst->id) }}"
                                                        class="p-2 bg-yellow-300 rounded-md hover:bg-yellow-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                            viewBox="0 -960 960 960" width="24" class="fill-yellow-700">
                                                            <path
                                                                d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('customer.delete', $cst->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="p-2 bg-red-600 rounded-md hover:bg-red-700"
                                                            onclick="return confirm('Are you sure want to delete {{ $cst->nama_depan }}?')">
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
