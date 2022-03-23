<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // untuk mendapatkan data. (tanpa pagination)
    public function index()
    {
        $products = Product::get(); // mengambil data dari database
        return view('pages.product.index', compact('products'));
    }

    // untuk mennyimpan data ke database
    public function store(Request $request)
    {   
        $data = $request->all(); // mendapatkan data request

        $validator = Validator::make($data, [ // memvalidasi data yang masuk
            'name' => 'required|max:255',
            'size' => 'required|max:50',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        if($validator->fails()){ // jika data yang dimasukan salah, akan kembali ke page create dengan pesan error
            return redirect()->route('create')
                ->with('errors', $validator->errors());
        }

        $product = Product::create($data); // menyimpan data 

        return redirect()->route('product')
            ->with('successMsg', 'Product Successfully Created!');
    }

    
    public function show($id)
    {
        $products = Product::findOrFail($id); // mengambil data dengan id yang dibawa 
        return view('pages.product.edit', compact('products'));
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [ // memvalidasi data yang masuk
            'name' => 'required|max:255',
            'size' => 'required|max:50',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        if($validator->fails()){ // jika data yang dimasukan salah, akan kembali ke page edit dengan pesan error
            return redirect()->route('edit')
                ->with('errors', $validator->errors());
        }

        $product = Product::findOrFail($id)->update($data); // mencari dan memperbarui data dengan id yang dibawa

        return redirect()->route('product')
            ->with('successMsg', 'Product Successfully Updated!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete(); // menghapus data dengan id yang dibawa

        return redirect()->route('product')
            ->with('successMsg', 'Product Successfully Deleted!');
    }
}
