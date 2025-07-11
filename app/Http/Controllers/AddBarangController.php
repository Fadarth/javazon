<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AddBarangController extends Controller
{
    public function index()
    {
        $data = Product::get();

        return view('add-barang.data', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('add-barang.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $image = null;

        $destinationPath = public_path() . '/images';
        if ($file = $request->hasFile('image')) {
            $temp = explode(".", $_FILES["image"]["name"]);
            $image = 'addbarang-' . date("YmdHis") . '.' . end($temp);

            $file = $request->file('image');
            $file->move($destinationPath, $image);
        }
        $row = new Product();
        $row->name = $request->name;
        $row->description = $request->description;
        $row->price = $request->price;
        $row->stock = $request->stock;
        $row->image = $image;
        $row->category_id =  $request->category_id;
        $row->save();

        return redirect('add-barang')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {

        $message = Product::find($id);
        $categories = Category::all();
        return view('add-barang.edit', compact('message', 'categories'));
    }

    public function update(Request $request)
    {
        $row = Product::find($request->id);

        $destinationPath = public_path() . '/images';
        $image = $row->foto;

        if ($file = $request->hasFile('image')) {
            $temp = explode(".", $_FILES["image"]["name"]);
            $image = 'addbarang-' . date("YmdHis") . '.' . end($temp);

            $file = $request->file('image');
            $file->move($destinationPath, $image);

            if ($row->foto != null && file_exists($destinationPath . '/' . $row->foto)) {
                unlink($destinationPath . '/' . $row->foto);
            }
        }
        $row->name = $request->name;
        $row->description = $request->description;
        $row->price = $request->price;
        $row->stock = $request->stock;
        $row->image = $image;
        $row->category_id =  $request->category_id;
        $row->update();

        return redirect('add-barang')->with('success', 'Edit data berhasil');
    }

    public function delete($id)
    {
        $row = Product::find($id);
        $destinationPath = public_path() . '/images';
        if ($row->image && file_exists($destinationPath . '/' . $row->image)) {
            unlink($destinationPath . '/' . $row->image);
        }
        $row->delete();

        return redirect('add-barang')->with('success', 'Data berhasil dihapus');
    }


    /**
     * API FUNCTION
     */
    public function get_all()
    {
        $data = Product::get();

        return response()->json($data);
    }
}