<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function index(Request $request)
    {

        $products = Product::paginate(15);

        if($request->wantsJson()){
           // return $products->toJson();
          return new ProductCollection($products);
        }

        return view('products.index',['products' => $products]);

    }

    public function create()
    {
        //Mostramos un formulario para crear nuesvos productos
        $product= New Product;
        return view('products.create',["product" => $product]);
    }

    public function store(Request $request)
    {
        $options = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ];

        if(Product::create($options)){
            return redirect('/products');
        }else{
            return back();
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show',['product' => $product ]);

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit",["product" => $product]);

    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if($product->save()){
          return redirect('/products');
        }else{
          return view("products.edit",["product" => $product]);
        }

    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');

    }
}
