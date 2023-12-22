<!DOCTYPE html>
<html>
@extends ('style')
<x-app-layout>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
                List Menu
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- table here -->
                        <div class="search-bar">
                            <form action="/kategoris/search" method="post">
                                @csrf
                                <input class="form-control mr-sm-2 " placeholder="Cari Nama Menu" type="text" name="q" />
                                <button id="searchbtn" class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kategori)
                                <tr scope="row">
                                    <td>{{$kategori->title}}</td>
                                    <td>{{$kategori->description}}</td>
                                    <td>
                                        @if($kategori->user)
                                            {{$kategori->user->name}}
                                        @else
                                            No User
                                        @endif</td>
                                    <td>
                                        <div class="container" id="boxfoto">
                                            <img class="fit-image" src="{{ asset('storage/' . $kategori->image) }}" />
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-success" href="/kategoris/{{$kategori->id}}/edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/kategoris/{{$kategori->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table here -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>

</html>