<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Faktur</title>
    <style>
        table.static {
            position: relative;
            border: 5px solid black;
            border-spacing: 5em;
        }

        td{
            padding: 0 60px;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h1 align = center>Nota Keranjang- Pembeli ({{ Auth::user()->name }})</h1>
        @php
        $invoiceNumber = 'INV-' . time(); // contoh: INV-1693494952
        @endphp
          <h4>Nomor Invoice: {{ $invoiceNumber }}</h4>

          {{-- @php
     $invoiceNumber = session('invoiceNumber', 'default-value-if-not-set');
            @endphp
            <p>Nomor Invoice: {{ $invoiceNumber }}</p> --}}
            <table class="static" align="center" rules="all" border="5px" width:90%>
                <tr>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub Total</th>

                </tr> 

                @php
                $total = 0;
               @endphp


                @foreach ($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cart->barang->nama}}</td>
                        <td>{{$cart->barang->kategori->name}}</td>
                        <td>{{$cart->barang->harga}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>Rp.{{$cart->barang->harga*$cart->quantity}}</td>

                        @php
                        $total += $cart->barang->harga * $cart->quantity;
                        @endphp
                    
                    </tr>
                @endforeach

                <tr>
                    <td colspan="6" height: 50px; >     <h3 style="margin-left: 800px;">Total: Rp.{{$total}}</h5></td>
                </tr>

            </table>



            

        </div>
                    

</body>
</html>