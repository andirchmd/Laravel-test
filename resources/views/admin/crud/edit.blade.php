@extends('layouts.global')
@section('title')
    Edit Order
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-[#1D2022]">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h1 class="text-2xl font-semibold text-gray-700 mb-4">Ubah Order</h1>
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
            <form method="POST" action="{{ route('admin.order.update',$order->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama_game" class="block text-sm font-medium text-gray-600">Nama Game</label>
                    <select id="nama_game" name="nama_game" class="mt-1 p-2 w-full border rounded-md">
                        <option value="" disabled>Pilih Game</option>
                        <option value="Genshin Impact" {{ $order->nama_game == 'Genshin Impact' ? 'selected' : '' }}>Genshin Impact</option>
                        <option value="Arknights" {{ $order->nama_game == 'Arknights' ? 'selected' : '' }}>Arknights</option>
                        <option value="Mobile Legends: Bang-Bang" {{ $order->nama_game == 'Mobile Legends: Bang-Bang' ? 'selected' : '' }}>Mobile Legends: Bang-Bang</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file_name" class="block text-sm font-medium text-gray-600">Upload Gambar Akun</label>

                    <!-- Hidden input to store the current file name -->
                    <input type="hidden" name="current_file_name" value="{{ $order->file_name }}">

                    <!-- Display the current file name -->
                    <input type="text" id="file_name_display" disabled value="{{ $order->file_name }}" class="mt-1 p-2 w-full border rounded-md" readonly>

                    <!-- Actual file input for user interaction -->
                    <input type="file" name="file_name" id="file_name" accept="image/*" class="hidden">

                    <!-- Button to trigger the file input -->
                    <button type="button" onclick="document.getElementById('file_name').click()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md">Choose File</button>
                </div>

                <script>
                    // Function to update the displayed file name
                    function updateFileNameDisplay() {
                        const fileNameDisplay = document.getElementById('file_name_display');
                        const fileNameInput = document.getElementById('file_name');
                        const currentFileName = document.getElementsByName('current_file_name')[0].value;

                        // Update the displayed file name
                        fileNameDisplay.value = fileNameInput.files.length > 0 ? fileNameInput.files[0].name : currentFileName;
                    }

                    // Attach an event listener to the file input to update the displayed file name
                    document.getElementById('file_name').addEventListener('change', updateFileNameDisplay);
                </script>


                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-600">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="mt-1 p-2 w-full border rounded-md max-h-40" rows="4">{{ $order->keterangan }}</textarea>
                </div>

                <button type="submit" class="w-full p-2 text-white rounded-md hover:bg-opacity-70" style="background-color: #1D2022;">Ubah</button>
            </form>
        </div>
    </div>
@endsection
