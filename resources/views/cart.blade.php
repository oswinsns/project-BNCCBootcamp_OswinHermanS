<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    @if(Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
        
    @endif

    @if($errors ->any()) 
      <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
      </div>
    @endif
    <div class="container col-md-8" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('LIST OF Barang yang Tersedia') }} </div>
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
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah_barang</th>
                                {{-- <th scope="col">Release</th> --}}
                                <th scope="col">Category</th>
                                <th scope="col">quantity</th>
                                <th scope="col">Alamat Pengiriman</th>
                                <th scope="col">Kode Pos</th>
                                <th scope="col">Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $book)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('storage/Image/'.$book->image)}}" alt="Error" style="height: 90px"></td>
                                <td>{{$book->nama}}</td>
                                <td>Rp.{{$book->harga}}</td>
                                <td>{{$book->jumlah_barang}}</td>
                                {{-- <td>{{$book->release}}</td> --}}
                                <td>{{$book->kategori->name}}</td>

                                    <form action="{{ route('cartStore')}}" method="POST">
                                        @CSRF
                                        <input type="hidden" name= "barang_id" value="{{$book->id}}">
                                        <input type="hidden" name= "user_id" value="{{Auth::user()->id}}">
                                        <td> <input type="number" name="quantity" value="1"></td>
                                        <td> <input type="text" name="Almt_Pengiriman" value=""></td>
                                        <td> <input type="number" name="Kode pos" value="1"></td>
                                        <td><button type="submit" class="btn btn-danger col-md">Cart</button> </td>
                                    </form>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    <div class="card-tools">
                        <a href="{{route('cetakBarang')}}" class="btn btn-sucess">Cetak Nota <i class="icon-download-alt"></i> </a>
                    </div>

                    <!-- Blade Template -->
                {{-- <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" id="add-to-cart-btn" class="btn btn-primary">Add to Cart</button>
                </form> --}}
                    
                    <br>
                    <h1 style="color:blue">Cetak Struk</h1>
                    {{-- @php
                    $invoiceNumber = 'INV-' . time(); // contoh: INV-1693494952
                    @endphp
                      <p>Content: {{$invoiceNumber}}</p> --}}

                      {{-- @php
                $invoiceNumber = session('invoiceNumber', 'default-value-if-not-set');
                    @endphp --}}
<p>Invoice Nota: Generating .....</p>
                    <table>
                        <tbody>
                            @php
                            $total = 0;
                           @endphp



                            @foreach($carts as $cart)
                            {{-- <p>{{$cart->user_id}}</p> --}}
                            <tr>
                            <td>{{$cart->pembeli->nama}}</td>
                            <td>{{$cart->barang->nama}}-{{$cart->barang->harga}}-Quantity({{$cart->quantity}})</td>
                            <td>Rp.{{$cart->barang->harga*$cart->quantity}}</td>
                            <td>{{$cart->Almt_Pengiriman}}</td> 
                            <td>{{$cart->Kode_pos}}</td>
                            </tr>
                            
                            @php
                            $total += $cart->barang->harga * $cart->quantity;
                            @endphp

                            @endforeach 

                        </tbody>
                    </table>

                    <h1>Total: Rp.{{$total}}</h1>

                    <div class="card-tools">
                        <a href="{{route('deleteNota')}}" class="btn btn-sucess">Delete Nota <i class="icon-trash"></i> </a>
                    </div>
    
                </div>
        </div>
    </div>
</body>
</html>