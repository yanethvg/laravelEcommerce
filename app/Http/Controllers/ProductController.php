<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //muestra una coleccion del recurso
    }

    public function create()
    {
        //Mostramos un formulario para crear nuesvos productos
        return view('products.create');
    }

    public function store(Request $request)
    {
        $options = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ];

        if(Product::create($options)){
            return redirect('/');
        }else{
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
