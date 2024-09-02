<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    
    @if(Session::has('error'))
    <div class="pt-3">
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    </div>
        
    @endif

    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('LIST OF ITEMS') }} </div>
                <div class="card-body">
                    <div class="col-md-6" style="">
                        <form action="" method="GET" class="input-group row">
                            <div class="input-group" style="">
                                <input type="text" class="form-control" name="cari" placeholder="Search" value=""/>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    <br>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                {{-- <th scope="col">Release</th> --}}
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $book)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('storage/image/'.$book->image)}}" alt="Error" style="height: 90px"></td>
                                <td>{{$book->nama}}</td>
                                <td>Rp.{{$book->harga}}</td>
                                <td>{{$book->jumlah_barang}}</td>
                                {{-- <td>{{$book->release}}</td> --}}
                                <td>{{$book->kategori->name}}</td>
                                <td>
                                    <a href="/update/{{$book->id}}"><button type="submit" class="btn btn-success col-md">Edit</button></a>
                                </td>
                                <td>
                                    <form action="{{ route('deleteBarang', ['id' => $book->id])}}" method="POST">
                                        @CSRF
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
</html>