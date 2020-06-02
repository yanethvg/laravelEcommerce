@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header>
        <h2>Mi carrito de compras </h2>
      </header>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-6">
            <products-shopping-component></products-shopping-component>
          </div>
          <div class="col-12 col-md-6 payments">
            <p>Paga tu total facilimente con cualquiera de éstos métodos, a través de PayPal</p>
            <img src="/images/cards.png" alt="" width="120">
            <img src="/images/paypal.png" alt="" width="120">
            <div class="mt-5">
              <a href="/pagar" class="btn btn-primary">Proceder al pago</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
