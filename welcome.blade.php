@extends('layouts.global')
@section('title')
Easy Game
@endsection
@section('content')
<div class="font-sans bg-gray-100 flex flex-col h-full">

    <!-- Home Section -->
    <section id="home" class="relative h-screen bg-cover bg-center items-center" style="background-image: url('images/home-bg.png');">
        <!-- Navbar -->
        <header class="sticky top-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-50">
            <div class="container mx-auto flex justify-between items-center py-4">
                <a href="#"><span class="text-white font-bold text-2xl [text-shadow:_3px_2px_#4e2f2f]">EasyGame</span></a>
                <div class="space-x-4">
                    <a href="#home" class="text-white [text-shadow:_3px_2px_#4e2f2f] hover:underline underline-offset-4">Home</a>
                    <a href="#product" class="text-white [text-shadow:_3px_2px_#4e2f2f] hover:underline underline-offset-4">Product</a>
                    <a href="#about" class="text-white [text-shadow:_3px_2px_#4e2f2f] hover:underline underline-offset-4">About</a>

                    @guest
                    <a href="{{ route("log") }}" class="bg-white text-gray-800 px-4 py-2 rounded-full">Login</a>
                    @endguest

                    @auth
                        @if(Auth::user()->role == 'user')
                            <a href="{{ route('user.order.add') }}" class="text-white font-medium [text-shadow:_3px_2px_#4e2f2f] hover:underline underline-offset-4">Order Joki</a>
                        @endif
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-white font-medium [text-shadow:_3px_2px_#4e2f2f] hover:underline underline-offset-4">Dashboard</a>
                        @endif
                    <a href="{{ route('logout') }}" class="bg-white text-gray-800 px-4 py-2 rounded-full">Logout</a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="absolute inset-0 flex flex-col justify-center items-start [text-shadow:_3px_2px_#4e2f2f] p-8">
            <h1 class="text-4xl font-bold text-white mb-4">Jasa Joki Game</h1>
            <p class="text-2xl text-white">Menerima permintaan untuk berbagai game mulai dari Genshin Impact,<br>Arknights, Mobile Legends, dan Apex Legends</p>
        </div>
    </section>



    <!-- Product Section -->
    <section id="product" class="h-screen bg-cover bg-center flex items-center" style="background-image: url('images/product-bg.png');">
        <div class="container mx-auto text-white text-center">
            <h2 class="text-3xl font-bold mb-8">Our Products</h2>
            <div class="flex justify-around">
                <!-- Card 1 -->
                <div class="border max-w-sm bg-[#1D2022] bg-opacity-60 rounded p-4 hover:translate-y-3 transition-transform duration-500">
                    <img src="images/arknek.jpg" alt="Game 1" class="w-full h-32 object-cover mb-4 rounded">
                    <p class="text-gray-300 font-medium py-1">Arknights</p>
                    <ul class="text-left py-2 list-disc list-inside">
                        <li>Joki Daily Quests</li>
                        <li>Joki Weekly Quests</li>
                        <li>Joki Daily Base Routine</li>
                        <li>Joki Weekly Annihilation</li>
                        <li>Joki Clear High Risk CC</li>
                        <li>Joki Upgrade Character sesuai request</li>
                        <li>Joki Empty Sanity Daily</li>
                        <li>Joki Clear Event</li>
                        <li>Joki Clear Story Stages</li>
                    </ul>
                </div>

                <!-- Card 2 -->
                <div class="border max-w-sm bg-[#1D2022] bg-opacity-60 rounded p-4 hover:translate-y-3 transition-transform duration-500">
                    <img src="images/genshin.jpeg" alt="Game 2" class="w-full h-32 object-cover mb-4 rounded">
                    <p class="text-gray-300 font-medium py-1">Genshin Impact</p>
                    <ul class="text-left py-2 list-disc list-inside">
                        <li>Joki Daily Mission</li>
                        <li>Joki Reputasi Mondstadt/Liyue/Inazuma</li>
                        <li>Joki Farm Local Item</li>
                        <li>Joki Mine Crystals</li>
                        <li>Joki Weekly Mission</li>
                        <li>Joki Battle Pass</li>
                        <li>Joki Habisin Resin Daily</li>
                        <li>Joki Elite Boss sesuai request</li>
                        <li>Joki Upgrade Materials</li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="border max-w-sm bg-[#1D2022] bg-opacity-60 rounded p-4 hover:translate-y-3 transition-transform duration-500">
                    <img src="images/mlbb.webp" alt="Game 3" class="w-full h-32 object-cover mb-4 rounded">
                    <p class="text-gray-300 font-medium py-1">Mobile Legends: Bang Bang</p>
                    <ul class="text-left py-2 mx-8 list-disc list-inside">
                        <li>Joki Grandmaster Pay/Star</li>
                        <li>Joki Epic Pay/Star</li>
                        <li>Joki Legend Pay/Star</li>
                        <li>Joki Mythic V-1 Pay/Point</li>
                        <li>Joki Mythic 600+ Pay/Point</li>
                        <li>Joki Mythic 800+ Pay/Point</li>
                        <li>Joki Mythic 1000+ Pay/Point</li>
                        <li>Joki Win Rate Pilihan</li>
                        <li>Joki Joki Stat Maniac/Savage</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <div id="about" class="w-full h-[92vh] bg-[#1D2022] px-10 pt-10">
        <div class="relative mt-16 mb-32 max-w-md mx-auto">
            <div class="rounded overflow-hidden shadow-md bg-white">
                <div class="absolute -mt-20 w-full flex justify-center">
                    <div class="h-32 w-32">
                        <img src="images/profil.jpeg" class="rounded-full object-cover h-full w-full shadow-md" />
                    </div>
                </div>
                <div class="px-6 mt-16">
                    <h1 class="font-bold text-3xl text-center mb-1">Andi Rachmad Triandika Rusli</h1>
                    <p class="text-gray-800 text-sm text-center">Mahasiswa Teknik Informatika</p>
                    <p class="text-center text-gray-600 text-base pt-3 font-normal">
                        Seorang mahasiswa yang sedang menempuh pendidikan di Universitas Mulawarman.
                        Ketertarikan saya terutama terfokus pada dunia game, dan inilah yang memotivasi saya untuk mendirikan EasyGame,
                        sebuah platform yang menyediakan jasa joki game.
                    </p>
                    <div class="w-full flex justify-center pt-5 pb-5">
                        <a href="https://github.com/andirchmd" class="mx-5">
                            <div aria-label="Github">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-github">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                    </path>
                                </svg>
                            </div>
                        </a>
                        <a href="#" class="mx-5">
                            <div aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-twitter">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                        <a href="https://instagram.com/andirchm_d" class="mx-5">
                            <div aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Footer Section -->
    <footer class="bg-[#1D2022] text-white py-4 h-[8vh]">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 EasyGame. All rights reserved.</p>
        </div>
    </footer>
</div>
@endsection
