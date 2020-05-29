@extends('layouts.app')

@section('content')
  <div class="container">
  <h1>{{$shopping_cart->id}}</h1>
  <a type="button" name="button" class="btn btn-success" href="{{route('products.create')}}">Crear Producto</a>
    <div class="mt-5">
      <products-component></products-component>
    </div>

    <div class="actions text-center">
      {{$products->links()}}
    </div>
  </div>
@endsection
