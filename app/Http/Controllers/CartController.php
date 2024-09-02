<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\barang;
use App\Models\Cart;
use App\Models\Category;

class CartController extends Controller
{
    public function getCart(){
        $barangs = barang::all();

        $userID = Auth::user()->id;
        $carts = Cart::where('user_id', $userID)->get();
        
        return view('cart', compact('barangs', 'carts'))->with('success', 'berhasil menambahkan data');
    }

    public function cartStore(Request $request){

        $barang = barang::find($request->barang_id);

        // Cart::create ([
        //     'quantity' => $request->quantity,
        //     'user_id' => $request->user_id,
        //     'barang_id' => $request->barang_id,
        //     'Almt_pengiriman' => $request->Almt_pengiriman,
        // ]);
        
        // create?{request}
        $request->validate([
            'user_id' => 'required',
            'barang_id' => 'required',
            'quantity' => 'required|integer|min:1|max:' . $barang->jumlah_barang,
            'Almt_Pengiriman' => 'required|min:10|max:100',
            'Kode_pos' => 'required|size:5',
        ], [
            'quantity.max' => 'Barang yang diinginkan Kekurangan, yang sabar ya :))'
        ]);



        Cart::create($request->all());

        session()->flash('success', 'Barang anda berhasil masuk keranjang');

       return redirect(route('getCart'));
    }

    public function cetakBarang(){
        $carts = Cart::all();
        // $kategori_barang = Category::all();
        return view('cetak', compact('carts'));
    }


public function deleteNota()
{
    // Deletes all records from the carts table
    DB::table('carts')->truncate();
    $barangs = barang::all();

    $userID = Auth::user()->id;
    $carts = Cart::where('user_id', $userID)->get();
    
    return view('cart', compact('barangs', 'carts'))->with('success', 'berhasil menghapuskan semua data');

}




}
