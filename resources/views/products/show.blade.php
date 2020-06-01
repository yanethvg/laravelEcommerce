@extends('layouts.app')

@section('content')
  <div class="row justify-content-sm-center">
    <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
      <div class="card">
        <header class="padding text-center bg-primary">
        </header>
        <div class="card-body padding">
          <h1 class="card-title">{{$product->title}}</h1>
          <h4 class="card-subtitle">{{$product->price}}</h4>

          <p class="card-text">{{$product->description}}</p>

          <div class="card-actions">
              {!! Form::open(['method' => 'POST' , 'url' => '/in_shopping_carts']) !!}
                <input type="hidden" name="product_id" value="{{ $product->id}}">
                <input type="submit"  class="btn btn-success" value="Agregar al carrito">
              {!! Form::close() !!}
              @include('products.delete')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
