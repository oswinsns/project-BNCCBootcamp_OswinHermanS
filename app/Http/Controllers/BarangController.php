<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\Category;

class BarangController extends Controller
{

     // getBooks buat tampilan isinya

    // buat tampilan form
    public function getCreatePage(){
        $categories = Category::all();

        return view('create', compact('categories'));
    }
    // buat function post book
    public function createBarang(BookRequest $request){

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->title.'_'.$request->author.'.'.$extension; //rename image
        $request->file('image')->storeAs('public/image/', $fileName); //saveimahe

        barang::create([
            'nama'=> $request->nama,
            'harga'=> $request->harga,
            'jumlah_barang'=> $request->jumlah_barang,
            // 'release'=> $request->release,
            'category_id' => $request->category_id,
            'image' => $fileName, 
        ]);

        return redirect(route('getBarangs'));
    }

    public function getBarangs(){
        $barangs = barang::all();
        return view('view', compact('barangs'));
    }

    public function getBarangss(){
        $barangs = barang::all();
        return view('userviewtemplate', compact('barangs'));
    }

    // public function updateBook(Request $request, $id){

    //     $book = Book::find($id);

    //     $book->update([
    //         'title'=> $request->title,
    //         'author'=> $request->author,
    //         'price'=> $request->price,
    //         'release'=> $request->release,
    //         'category_id' => $request->category_id,
    //     ]);

    //     return redirect(route('getBooks'));
    // }

    public function updateBarang(Request $request, $id){

        $barang = barang::find($id);

        if ($request->hasFile('image')) {
            // Get the file extension and create a new file name
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->nama.'_'.$request->harga.'.'.$extension;
    
            // Store the new image
            $request->file('image')->storeAs('public/image/', $fileName);
    
            // Update the image field in the database
            $barang->update([
                'image' => $fileName,
            ]);
        }

        $barang->update([
            'nama'=> $request->nama,
            'harga'=> $request->harga,
            'jumlah_barang'=> $request->jumlah_barang,
            // 'release'=> $request->release,
            'category_id' => $request->category_id,
            // 'image' => $fileName, 
        ]);

        return redirect(route('getBarangs'));
    }

    public function getBarangById($id){
        $categories = Category::all();
        $barang = barang::find($id);
        return view('update', compact('barang', 'categories'));
    }

    public function deleteBarang($id){
        barang::destroy($id);
        return redirect(route('getBarangs'));
    }

    public function cetakBarang(){
        $barangs = barang::all();
        return view('cetak', compact('barangs'));
    }


}

