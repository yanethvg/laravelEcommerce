@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="">
      <products-component></products-component>
    </div>

    <div class="actions text-center">
      {{$products->links()}}
    </div>
  </div>
@endsection
