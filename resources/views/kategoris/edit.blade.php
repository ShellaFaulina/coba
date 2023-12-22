<!DOCTYPE html>
<html id="createbody">
    @extends ('style')
    <body id="createbody">
        <x-app-layout>
            <br>
            <div id="createbox" class="container">
                <h1>Edit {{$kategoris->title}}</h1>
                <form action="/kategoris/{{$kategoris->id}}"" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <table class="container">
                        <tbody>
                            <tr>
                                <td class="column1"><p>Judul: </p></td>
                                <td class="column2"><input type="text" name="title" value="{{$kategoris->title}}" required></td>
                            </tr>
                            <tr>
                                <td class="column1"><p>Keterangan: </p></td>
                                <td class="column2"><textarea name="description" id="" cols="30" rows="10" required>{{$kategoris->description}}</textarea></td>
                            </tr>
                            <tr>
                                <td class="column1"><p>Foto: </p></td>
                                <td class="column2"><input type="file" name="image" id="" value="{{ asset('storage/' . $kategoris->image) }}" required>{{ asset('storage/' . $kategoris->image) }}</td>
                            </tr>
                            <tr>
                                <td class="column1"></td>
                                <td class="column2"><button id="searchbtn" class="btn btn-outline-success" type="submit">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </form>
            </div>
        </x-app-layout>
    </body>
</html>
