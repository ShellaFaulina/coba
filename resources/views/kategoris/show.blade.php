<!DOCTYPE html>
<html>
@extends ('style')
    <body>
        <nav class="navbar fixed-top">
            <!-- Logo user -->
                <div id="logo">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                            @endauth
                        </div>
                    @endif
                </div>
            <!-- Logo user -->
            <!-- search bar -->
            <div class="search-bar">
                <form action="/main/search" method="post">
                    @csrf
                    <a id="searchbtn" class="btn btn-outline-success" href="/main/perpus">Kembali ke daftar menu</a>
                </form>
            </div>
            <!-- search bar -->
        </nav>

        <div id="showbuku" class="container">
            <!-- detail buku -->
            <div class="container">
                <img src="{{ asset('storage/' . $kategori->image) }}" alt=""> <br>
            </div>
            <div class="container">
                <div class="container">
                    <h3>Name: {{$kategori->title}}</h3>
                </div>
                <div class="container">
                    <p>Description: {{$kategori->description}}</p>
                </div>
                <div class="container">
                    @if(auth()->check())
                        @if(auth()->user()->roleid === 1)
                            <!-- Admin -->
                        @elseif(auth()->user()->roleid === 2)
                            <!-- Member -->
                            @if($book->status_menu === 1)
                                <a id="searchbtn" class="btn btn-outline-success" href="/books/{{$book->id}}/pinjam">selesai</a>
                            @elseif($book->status_menu === 2)
                                <p class="hl-red">Menu ini sedang diproses</p>
                            @endif
                        @endif
                        <!-- Common -->
                        @else
                        <!-- Guest -->
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>