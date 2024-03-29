<!DOCTYPE html>
<html>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1> {{$title}} Menu</h1>
                </div>
            </div>
        </div>
    </div>
<form action="/kategoris/search" method="post">
    @csrf
    <input type="text" name="q" />
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>User</th>
        <th>Tindakan</th>
    </tr>
    @foreach($kategoris as $kategori)
    <tr>
        <td>{{$kategori->title}}</td>
        <td>{{$kategori->description}}</td>
        <td>    @if($kategori->user)
                    {{$kategori->user->name}}
                @else
                    No User
                @endif</td>
        <td>
            Image: <img src="{{ asset('storage/' . $kategori->image) }}" />
        </td>
        <td>
            <a href="/kategoris/{{$kategori->id}}/edit">Edit</a>
        </td>
        <td>
            <form action="/kategoris/{{$kategori->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">DELETE</button>
                </form>
        </td>

    </tr>
    @endforeach
</table>
</x-app-layout>

</html>