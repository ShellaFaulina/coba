<div>
    <h1>Your Menu</h1>
    <br>
    <table class="table table-bordered">
        <thead>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr scope="row">
                <td>{{ $kategori->title }}</td>
                <td>{{ $kategori->description }}</td>
                <td>{{ $kategori->user->name}}</td>
                
                @if($book->tempstatus == 3)
                    <td>Menu Baru</td>
                @elseif($book->tempstatus == 2)
                    <td>Menu Lama</td>
                    <td>
                    <button class="btn btn-outline-success"  onclick="window.location.href='/main/{{$kategori->id}}/validasistatus'">Konfirmasi</button>
                    </td>
                @else
                    <td>error</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    