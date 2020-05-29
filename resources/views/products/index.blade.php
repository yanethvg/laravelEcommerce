@extends('layouts.app')

@section('content')
  <div class="container">
  <a type="button" name="button" class="btn btn-success" href="{{route('products.create')}}">Crear Producto</a>
    <div class="mt-5">
      <products-component></products-component>
    </div>

    <div class="actions text-center">
      {{$products->links()}}
    </div>
  </div>
@endsection
